<template>
  <div>
    <div
      class="d-flex align-center"
    >
      <img
        height="75px"
        width="75px"
        alt="weather_image"
        :src="`http://openweathermap.org/img/wn/${icon}@2x.png`"
      >
      <div>
        <span>
          {{ timestamp | convertUNIXToDate }}
        </span>
        <div class="caption font-weight-bold">
          {{ description }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    timestamp: {
      type: [String, Number],
      default: null
    },
    icon: {
      type: String,
      default: null
    },
    description: {
      type: String,
      default: null
    }
  },
  filters: {
    convertUNIXToDate(value) {
      const unixTimestamp = value;

      const milliseconds = unixTimestamp * 1000;

      const dateObject = new Date(milliseconds);

      return dateObject.toDateString();
    }
  }
}
</script>