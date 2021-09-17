const BASE_PATH = '/weathers';

export const WeatherModuleRoutes = [
  {
    path: `${BASE_PATH}/`,
    name: 'BaseWeatherModule',
    component: () => import(/* webpackChunkName: 'WeatherModule' */ '../WeatherModule'),
    redirect: '/locations',
  },
  {
    path: `${BASE_PATH}/:name`,
    name: 'WeatherModule',
    component: () => import(/* webpackChunkName: 'WeatherModule' */ '../WeatherModule'),
    redirect: '/',
    children: [
      {
        path: '/',
        name: 'WeatherPage',
        component: () => import(/* webpackChunkName: 'WeatherPage' */ '../pages/WeatherPage'),
      }
    ]
  }
]
