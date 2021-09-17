<template>
  <v-container fluid class="fill-height">
    <v-row align="center">
      <v-col>
        <div class="text-center text-h6 font-weight-bold mb-10">
          Where do you want to go?
        </div>
        <location-list />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  components: {
    LocationList: () => import(/* webpackChunkName: "LocationList" */'../components/lists/LocationList.vue')
  }
}
</script>