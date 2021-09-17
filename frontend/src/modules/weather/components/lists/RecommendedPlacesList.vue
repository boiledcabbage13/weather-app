<template>
<v-card class="pa-4">
  <v-card-title>
    Recommended Places:
  </v-card-title>
  <v-card-text style="overflow-y:scroll;height:500px">
    <v-list>
      <v-list-item v-for="(place, key) in places" :key="key" two-line>
        <v-list-item-content>
          <v-list-item-title class="text-h6">{{ place.name }}</v-list-item-title>
          <v-list-item-subtitle v-for="address in place.location.formattedAddress" :key="address">
            {{ address }}
          </v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-card-text>
</v-card>
</template>

<script>
export default {
  props: {
    places: {
      type: Array,
      default: () => {
        return []
      }
    }
  }
}
</script>