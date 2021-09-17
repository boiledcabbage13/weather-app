import axios from '../../plugins/axios';
const resource = '/api/weathers';

export default {
  getViaCity(payload) {
    return axios.get(`${resource}`, payload);
  },
  getViaCoordinates(payload) {
    return axios.get(`${resource}/coordinates`, payload);
  }
}