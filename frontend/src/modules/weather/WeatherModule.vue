<template>
  <router-view></router-view>
</template>

<script>
export default {
  methods: {
     checkCity(city) {
      if (!city) {
        this.$router.push('/');

        return;
      }

      return;
    }
  },
  created() {
    this.checkCity(this.$route.params.name);
  }
}
</script>