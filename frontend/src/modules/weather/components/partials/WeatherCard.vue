<template>
  <v-card>
    <v-card-title class="d-flex align-center">
      <div>
        <span>
          {{ name | upperCase }}
        </span>
      </div>
    </v-card-title>
    <v-card-text style="overflow-y:scroll;height:500px">
      <template v-for="(day, key) in weekWeather">
        <weather-details-section
          :key="key"
          :timestamp="day.dt"
          :icon="day.weather[0].icon"
          :description="day.weather[0].description"
        ></weather-details-section>
      </template>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  components: {
    WeatherDetailsSection: () => import(/* webpackChunkName: "WeatherDetailsSection" */ './WeatherDetailsSection.vue')
  },
  props: {
    name: {
      type: String,
      required: true
    },
    weekWeather: {
      type: Array,
      default: () => {
        return []
      }
    }
  },
  filters: {
    upperCase(value) {
      return value.toUpperCase()
    } 
  }
}
</script>