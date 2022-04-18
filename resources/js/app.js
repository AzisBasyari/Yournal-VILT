import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import moment from 'moment';


moment.locale('id');
moment.updateLocale('id', {
  longDateFormat:{
    LLLL: 'dddd, DD MMMM YYYY'
  }
})

InertiaProgress.init({
  delay: 100,
  color: '#1f2937',
  showSpinner: true
});

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
});