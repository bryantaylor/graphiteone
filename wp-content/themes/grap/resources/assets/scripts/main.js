import 'jquery'
import 'slick-carousel'

// Import everything from autoload
import './autoload/**/*'

import * as Func from './func'

// Load Events
$(document).ready(() => {
  Func.handleToggleMobileTopMenu()
  Func.createPostSlider()
  Func.trimElement()
  Func.activeTab()
})
