<template>
  <v-card v-bind="$attrs" v-on="$listeners">
    <v-card-text class="text-center">
      <span class="text-h6 font-weight-bold black--text">
        {{ name | upperCase }}
      </span>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  props: {
    name: {
      type: String,
      required: true
    }
  },
  filters: {
    upperCase(value) {
      return value.toUpperCase()
    } 
  }
}
</script>