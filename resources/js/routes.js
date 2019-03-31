import Home from './components/Home.vue';
import Header from './components/Header.vue';
import Map from './components/Map.vue';
export const routes = [
  {
      name: 'Home',
      path: '/',
      component: Home
  },
    {
        name: 'Header',
        path: '/',
        component: Header
    },
    {
        name: 'Map',
        path: '/',
        component: Map
    },
];
