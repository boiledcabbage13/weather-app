<template>
  <div>
    <div v-if="status === 'done'">
      <template v-for="(city, key) in cities">
        <location-card
          :key="key"
          :name="city.name"
          class="ma-4"
          @click="setCity(city)"
        ></location-card>
      </template>
    </div>
    <div v-if="status === 'loading'">
      <v-skeleton-loader
        v-for="index in 6"
        :key="index"
        height="60"
        type="image"
        class="ma-4"
      ></v-skeleton-loader>
    </div>
    <div v-if="status === 'error'">
      <div class="text-center font-weight-bold red--text">
        Something went wrong.
      </div>
    </div>
  </div>
</template>

<script>
import {
  locationRepositoryApi
} from '@/services/repositories'

export default {
  components: {
    LocationCard: () => import(/* webpackChunkName: "LocationCard" */ '../partials/LocationCard.vue')
  },
  data: () => ({
    status: 'loading'
  }),
  computed: {
    cities: function() {
      return this.$store.getters['locations/locations'];
    }
  },
  methods: {
    async getCities() {
      this.status = 'loading';

      await locationRepositoryApi.get()
        .then(response => {
          let {
            data: {
              data: items
            }
          } = response;

          const cities = Object.keys(items).map(item => {
            return {
              name: item,
              ...items[item]
            };
          });

          this.$store.commit('locations/setLocations', cities)

          this.status = 'done';
        })
        .catch(() => {
          this.$store.commit('locations/setLocations', [])

          this.status = 'error';
        })
    },
    setCity(city) {
      this.$router.push(`/weathers/${city.name}`);
      this.$store.commit('locations/setLocation', city)
    },
    cachedCities() {
      if (this.cities.length == 0) {
        this.getCities();

        return;
      }

      this.status = 'done';

      return;
    }
  },
  created() {
    this.cachedCities();
  }
}
</script>