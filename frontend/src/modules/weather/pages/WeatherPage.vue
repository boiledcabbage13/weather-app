<template>
  <v-container fluid class="pa-4">
    <v-row>
      <v-col>
        <v-btn @click="$router.push('/locations')" icon>
          <v-icon>mdi-keyboard-backspace</v-icon>
        </v-btn>
      </v-col>
    </v-row>
    <v-row v-if="status === 'done'">
      <v-col
        cols="12"
        md="6"
      >
        <weather-card
          :name="$route.params.name"
          :week-weather="weather.daily"
        ></weather-card>
      </v-col>
      <v-col
        cols="12"
        md="6"
      >
        <recommended-places-list
          :places="recommendedPlaces"
        ></recommended-places-list>
      </v-col>
    </v-row>
    <v-row v-if="status === 'loading'">
      <v-col>
        <div class="text-center">
          <v-progress-linear
            indeterminate
            color="primary"
          ></v-progress-linear>
        </div>
      </v-col>
    </v-row>
    <v-row v-if="status === 'error'">
      <v-col>
        <div class="text-center">
          <span class="text-h6 font-weight-bold red--text">
            Something went wrong.
          </span>
        </div>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import {
  weatherRepositoryApi,
  locationRepositoryApi
} from '@/services/repositories'

export default {
  components: {
    WeatherCard: () => import(/* webpackChunckName: "Weathercard"*/ '../components/partials/WeatherCard.vue'),
    RecommendedPlacesList: () => import(/* webpackChunckName: "RecommendedPlacesList"*/ '../components/lists/RecommendedPlacesList.vue')
  },
  data: () => ({
    weather: {},
    recommendedPlaces: [],
    status: 'loading'
  }),
  methods: {
    async getViaCity(city) {
      let params = {
        city
      };

      await weatherRepositoryApi.getViaCity({ params })
        .then(async response => {
          let {
            data: {
              data: weather
            }
          } = response;

          let {
            latitude,
            longitude
          } = weather

          await this.getViaCoordinates(latitude, longitude);
          await this.getRecommendedPlaces(latitude, longitude);

          this.status = await 'done';
        })
        .catch(() => {
          this.status = 'error';
        })
    },
    async getViaCoordinates(latitude, longitude) {
      let params = {
        latitude,
        longitude
      };

      await weatherRepositoryApi.getViaCoordinates({ params })
        .then(response => {
          let {
            data: {
              data: weather
            }
          } = response;

          this.weather = weather;
        })
        .catch(() => {
          this.weather = {};
          this.status = 'error';
        })
    },
    async getRecommendedPlaces(latitude, longitude) {
      let params = {
        latitude,
        longitude
      };

      await locationRepositoryApi.getRecommendedPlaces({ params })
        .then(response => {
          let {
            data: {
              data: {
                recommended_places: recommendedPlaces
              }
            }
          } = response;

          this.recommendedPlaces = recommendedPlaces.map(item => {
            return item.venue;
          });
        })
        .catch(() => {
          this.recommendedPlaces = [];
          this.error = 'error';
        })
    }
  },
  created() {
    this.getViaCity(this.$route.params.name);
  }
}
</script>