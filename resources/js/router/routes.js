function page(path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  // { path: '/', name: 'welcome', component: page('welcome.vue') },

  { path: '/', name: 'login', component: page('auth/login.vue') },
  { path: '/register', name: 'register', component: page('auth/register.vue') },
  { path: '/password/reset', name: 'password.request', component: page('auth/password/email.vue') },
  { path: '/password/reset/:token', name: 'password.reset', component: page('auth/password/reset.vue') },
  { path: '/email/verify/:id', name: 'verification.verify', component: page('auth/verification/verify.vue') },
  { path: '/email/resend', name: 'verification.resend', component: page('auth/verification/resend.vue') },

  { path: "/event", name: "Event", component: page('customer/Event.vue') },
  { path: "/event/create", name: "CreateEvent", component: page('customer/CreateEvent.vue') },
  { path: "/event/:id", name: "EventDetail", component: page('customer/EventDetail.vue') },
  { path: "/profile", name: "Profile", component: page('customer/Profile.vue') },
  { path: "/profile/ticket", name: "Ticket", component: page('customer/Ticket.vue') },
  { path: "/profile/notification", name: "Notification", component: page('customer/Notification.vue') },
  { path: "/profile/preorder", name: "PreOrder", component: page('customer/PreOrder.vue') },
  { path: "/profile/setting", name: "Setting", component: page('customer/Setting.vue') },

  { path: "/organizer", name: "HomeOrganizer",component: page('organizer/Home.vue') },
  { path: "/organizer/register", name: "RegisterOrganizer",component: page('organizer/Register.vue') },

  { path: "/event/order/:id", name: "EventOrderDetails", component: page('customer/OrderDetails.vue') },
  { path: "/booth/detail/:id", name: "BoothDetails", component: page('shop/BoothDetails.vue') },

  { path: '/home', name: 'home', component: page('home.vue') },
  {
    path: '/settings',
    component: page('settings/index.vue'),
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: page('settings/profile.vue') },
      { path: 'password', name: 'settings.password', component: page('settings/password.vue') }
    ]
  },

  { path: '*', component: page('errors/404.vue') }
]
