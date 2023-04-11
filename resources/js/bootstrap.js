/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
import axios from 'axios';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


window.Pusher = Pusher;

window.Echo = new Echo({
  broadcaster: 'pusher',
  key: '7a9f6c5e35fe0f70529d',
  cluster: 'mt1',
  encrypted: true
});
