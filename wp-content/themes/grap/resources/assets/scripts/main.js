import 'jquery'
import 'slick-carousel'

// Import everything from autoload
import './autoload/**/*'

import Router from './util/Router'
import contact from './routes/contact'
import * as Func from './func'

const routes = new Router({
  contact,
});

// Load Events
$(document).ready(() => {
  Func.handleToggleMobileTopMenu()
  Func.createPostSlider()
  Func.createQuoteSlider()
  Func.trimElement()
  Func.activeTab()
  Func.handleLoadPosts()
  Func.createNewsletterSignUpFormHandler()
  routes.loadEvents()
})
