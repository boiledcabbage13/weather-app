import axios from '../../plugins/axios';
const resource = '/api/locations';

export default {
  get(payload) {
    return axios.get(`${resource}`, payload);
  },
  getRecommendedPlaces(payload) {
    return axios.get(`${resource}/recommended-places`, payload);
  }
}