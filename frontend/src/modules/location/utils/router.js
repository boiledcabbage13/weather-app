const BASE_PATH = '/locations';

export const LocationModuleRoutes = [
  {
    path: BASE_PATH,
    name: 'LocationModule',
    component: () => import(/* webpackChunkName: 'LocationModule' */ '../LocationModule'),
    redirect: '/',
    children: [
      {
        path: '/',
        name: 'LocationPage',
        component: () => import(/* webpackChunkName: 'LocationPage' */ '../pages/LocationPage'),
      }
    ]
  }
]
