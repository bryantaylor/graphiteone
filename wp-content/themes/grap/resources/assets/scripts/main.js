import 'jquery'
import 'slick-carousel'

// Import everything from autoload
import './autoload/**/*'

import * as Func from './func'

// Load Events
$(document).ready(() => {
  Func.handleToggleMobileTopMenu()
  Func.createPostSlider()
  Func.createQuoteSlider()
  Func.trimElement()
  Func.activeTab()
  Func.handleLoadPosts()
  Func.createNewsletterSignUpFormHandler()
})
