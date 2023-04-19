// ***
// sticky.js
//
// Sets fixed state on elements and handles their overflow scroll (locking the body's scroll whilst doing so).
//
// Steps:
// 1. Add `.sticky-parent` class to the parent element
// 2. Add `.sticky-element` class to the element we want to apply the sticky functionality to
//
// Optional:
// * Add `data-related-element-id` data-attribute to `.sticky-element` to toggle an `-active`
//   class on it whilst the sticky is fixed
//
// * Add `data-sticky-breakpoint` data-attribute to `.sticky-parent` to set a threshold for at
//   what breakpoint the sticky functionality should be disabled
//
// @breadadams
// ***

jQuery(window).load(function () {

  var stickyParents = document.querySelectorAll('.sticky-parent'); // .sticky-parent elements
  var headerHeight = jQuery('#header').outerHeight(); // Fixed header height
  var unstickStickyEvent = new CustomEvent('unstickSticky'); // Event to unstick a sticky element

  // If any stickyParents exist
  if (stickyParents.length) {

    // Loop over stickyParents
    jQuery(stickyParents).each(function(index, stickyParent) {
      var stickyElement = stickyParent.querySelector('.sticky-element'); // Get the stickyElement
      var stickyBreakpoint = stickyParent.dataset.stickyBreakpoint;

      // If stickyElement exists
      if (stickyElement !== null) {
        var stickyElement_Height = jQuery(stickyElement).outerHeight(true), // stickyElement's height
            stickyElementInner = stickyElement.querySelector('.sticky-element-inner'), // stickyElement inner element
            stickyElementRelatedId = stickyElement.dataset.relatedElementId,
            stickyElementRelatedActiveItem = document.getElementById(stickyElementRelatedId); // related element to toggle `-active` class on (eg. header buttons)

        // If stickyElementInner exists
        if (stickyElementInner !== null) {

          // stickyParentScrollStatus statuses
          var BEFORE = 'before',
              DURING = 'during',
              AFTER = 'after';

          var stickyParentScrollStatus = ''; // 'before' | 'during' | 'after'

          // CSS positioning helper methods

          // Position absolute, "stuck to top"
          var stickyPosAbsTop = function(prog) {
            stickyElement.style.position = 'absolute';
            stickyElement.style.top = 0;
            stickyElement.style.removeProperty('bottom');
            if (prog === true) {
              unlockBodyScroll();
            }
          }
          // Position absolute, "stuck to bottom"
          var stickyPosAbsBottom = function(prog) {
            stickyElement.style.position = 'absolute';
            stickyElement.style.bottom = 0;
            stickyElement.style.removeProperty('top');
            if (prog === true) {
              unlockBodyScroll();
            }
          }
          // Position fixed, offset by headerHeight
          var stickyPosFixed = function(prog) {
            stickyElement.style.position = 'fixed';
            stickyElement.style.top = headerHeight+'px';
            stickyElement.style.removeProperty('bottom');
            if (prog === true) {
              unlockBodyScroll();
            }
          }

          // Set/unset active class on sticky's related item
          var updateRelatedItemClass = function(active) {
            if (stickyElementRelatedActiveItem !== null) {
              if (active === true) {
                stickyElementRelatedActiveItem.classList.add('-active');
              } else if (active === false) {
                stickyElementRelatedActiveItem.classList.remove('-active');
              }
            }
          }

          // Waypoint for when the top of StickyParent
          // hits the bottom of #header
          var waypoint_parentTouchTop = new Waypoint({
            element: stickyParent,
            handler: function(direction) {
              if (tallerThanViewport(stickyParent)) {
                if (direction === 'down') { // On scroll into parent
                  if (stickyParentScrollStatus !== DURING && !PROGRAMMATIC_SCROLLING) {
                    stickyPosFixed();
                    updateRelatedItemClass(true);
                    stickyParentScrollStatus = DURING;
                  } else if (PROGRAMMATIC_SCROLLING) {
                    if (CLICKED_HREF_SCROLL === stickyElementRelatedId) {
                      stickyPosFixed(true);
                      updateRelatedItemClass(true);
                    } else {
                      stickyPosAbsBottom(true);
                      updateRelatedItemClass(false);
                    }
                    stickyParentScrollStatus = DURING;
                  }
                } else if (direction === 'up') { // On scroll up out of parent
                  if (stickyParentScrollStatus !== BEFORE && !PROGRAMMATIC_SCROLLING) {
                    checkIfHasToScrollUp(stickyElement, stickyElementInner, stickyParent, function(keepFixed) {
                      var shouldKeepFixed = keepFixed !== undefined ? keepFixed : false;

                      if (!shouldKeepFixed) {
                        stickyPosAbsTop();
                        updateRelatedItemClass(false);
                        stickyParentScrollStatus = BEFORE;
                      }
                    })
                  } else if (PROGRAMMATIC_SCROLLING) {
                    stickyPosAbsTop(true);
                    updateRelatedItemClass(false);
                    stickyParentScrollStatus = BEFORE;
                  }
                }
              } else {
                stickyPosAbsTop();
              }
            },
            offset: headerHeight
          })

          // Waypoint for when bottom of stickyParent
          // hits the bottom of the viewport
          var waypoint_parentTouchBottom = new Waypoint({
            element: stickyParent,
            handler: function(direction) {
              if (tallerThanViewport(stickyParent)) {
                if (direction === 'down') { // On scroll past parent
                  if (stickyParentScrollStatus !== AFTER && !PROGRAMMATIC_SCROLLING) {
                    checkIfHasToScrollDown(stickyElement, stickyElementInner, stickyParent, function() {
                      stickyPosAbsBottom();
                      updateRelatedItemClass(false);
                      stickyParentScrollStatus = AFTER;
                    })
                  } else if (PROGRAMMATIC_SCROLLING) {
                    stickyPosAbsBottom(true);
                    updateRelatedItemClass(false);
                    stickyParentScrollStatus = AFTER;
                  }
                } else if (direction === 'up') { // On scroll up into parent
                  if (stickyParentScrollStatus !== DURING && !PROGRAMMATIC_SCROLLING) {
                    stickyPosFixed();
                    updateRelatedItemClass(true);
                    stickyParentScrollStatus = DURING;
                  } else if (PROGRAMMATIC_SCROLLING) {
                    if (CLICKED_HREF_SCROLL === stickyElementRelatedId) {
                      stickyPosFixed(true);
                      updateRelatedItemClass(true);
                    } else {
                      stickyPosAbsTop(true);
                      updateRelatedItemClass(false);
                    }
                    stickyParentScrollStatus = DURING;
                  }
                }
              } else {
                stickyPosAbsTop();
              }
            },
            offset: function() {
              // Subtract viewport height from the stickyParent height
              // and subtract *that* from the main top offset of stickyParent
              return -(this.element.clientHeight - Waypoint.viewportHeight())
            }
          })

          document.body.addEventListener('unstickSticky', function(e) {
            if (stickyParentScrollStatus === DURING) {
              stickyPosAbsTop(true);
              updateRelatedItemClass(false);
            }
          }, false);

          if (stickyElementRelatedActiveItem !== null) {
            stickyElementRelatedActiveItem.addEventListener('click', function() {
              document.body.dispatchEvent(unstickStickyEvent)
            }, false);
          }
        }
      }

      // Disable sticky as per its breakpoint setting
      if (stickyBreakpoint !== undefined) {
        var breakpointSize = Number(stickyBreakpoint);
        var screenWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0); // screen width on load
        var stickyEnabled = screenWidth > breakpointSize ? true : false;

        var stickysWaypoints = [waypoint_parentTouchTop, waypoint_parentTouchBottom]

        // If sticky is disabled on load, disable it
        if (!stickyEnabled) {
          unlockBodyScroll()
          disableMultipleWaypoints(stickysWaypoints)
        }

        var resizeTimeout;
        window.addEventListener('resize', function() {
          clearTimeout(resizeTimeout);
          resizeTimeout = setTimeout(function() {
            var screenWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
            
            if (screenWidth <= breakpointSize && stickyEnabled) {
              unlockBodyScroll()
              disableMultipleWaypoints(stickysWaypoints)
              stickyEnabled = false
            } else if (screenWidth > breakpointSize && !stickyEnabled) {
              enableMultipleWaypoints(stickysWaypoints)
              stickyEnabled = true
            }
          }, 600);
        })
      }
    })

    // Window resize event
    // Executes 600ms after the last resize event,
    // to be sure it's ran after transitions finished
    var resizeTimeout;
    window.addEventListener('resize', function() {
      clearTimeout(resizeTimeout);
      resizeTimeout = setTimeout(function() {
        Waypoint.refreshAll();
      }, 600);
    })
  }
});

// ***
// HELPER METHODS
// ***

// Check if element1 is taller than element2
var isTallerThan = function(element1, element2) {
  return jQuery(element1).outerHeight(true) > jQuery(element2).outerHeight(true);
}

// Return throttled function afer specified timeout length
var throttleFunction = function(ms, callback) {
  var tF;
  return function() {
    var self = this, args = arguments;
    clearTimeout(tF);
    tF = setTimeout(function() {
      callback.apply(self, args);
    }, ms);
  };
}

// Check if sticky element has more content to scroll down
var checkIfHasToScrollDown = function(stickyElement, stickyElementInner, stickyParent, callback) {

  // Returns TRUE if the stickyElement is scrolled right to the bottom
  var hasToScroll = function() {
    return stickyElement.scrollTop < (jQuery(stickyElementInner).outerHeight(true) - jQuery(stickyElement).outerHeight(true))
  }

  // If stickyElement has scroll overflow & isn't already scrolled
  if (isTallerThan(stickyElementInner, stickyElement) && hasToScroll()) {

    var lockedScrollPosition = jQuery(stickyParent).position().top + jQuery(stickyParent).outerHeight(true) - window.innerHeight; // Get the scroll-position of when stickyParent is touching bottom of viewport
    if (!PROGRAMMATIC_SCROLLING) {
      lockBodyScroll(lockedScrollPosition);
    }

    // Move down 1 pixel if at the very top,
    // a "hack" so that scrollTop in mousewheel
    // event is always more than 0 initially
    if (stickyElement.scrollTop === 0) {
      stickyElement.scrollTop += 1;
    }

    // Add wheel event listener
    jQuery(window).on('wheel', throttleFunction( 1, function(e) {
      e.stopPropagation();
      var normalizedScroll = normalizeWheel(e.originalEvent);
      var deltaScrollDistance = normalizedScroll.pixelY; // Distance scrolled on "this" scroll event

      // If there's still space to scroll down inside stickyElement and we're not at top
      if (hasToScroll() && (stickyElement.scrollTop > 0)) {
        stickyElement.scrollTop += deltaScrollDistance; // Update stickyElement scrollTop with delta scroll value
      } else if (!hasToScroll()) {
        unlockBodyScroll('down');
        return callback(); // Run the callback
      }
    }));

  } else {
    return callback(); // Run the callback
  }
}

// Check if sticky element has more content to scroll up
var checkIfHasToScrollUp = function(stickyElement, stickyElementInner, stickyParent, callback) {

  // Returns TRUE if the stickyElement is scrolled past 0
  var hasToScroll = function() {
    return stickyElement.scrollTop > 0
  }

  // If stickyElement has scroll overflow
  if (hasToScroll()) {

    var lockedScrollPosition = jQuery(stickyParent).position().top - jQuery('#header').outerHeight(true); // Get the top position of stickyParent
    if (!PROGRAMMATIC_SCROLLING) {
      lockBodyScroll(lockedScrollPosition);
    }

    // Move up 1 pixel if at the very bottom,
    // a "hack" so that scrollTop in mousewheel
    // event is never at the very bottom on init
    if (stickyElement.scrollTop === (jQuery(stickyElementInner).outerHeight(true) - jQuery(stickyElement).outerHeight(true))) {
      stickyElement.scrollTop -= 1;
    }

    // Add wheel event listener
    jQuery(window).on('wheel', throttleFunction( 1, function(e) {
      e.stopPropagation();
      var normalizedScroll = normalizeWheel(e.originalEvent);
      var deltaScrollDistance = normalizedScroll.pixelY; // Distance scrolled on "this" scroll event

      // If there's still space to scroll inside stickyElement and we're not at the bottom
      if (
        hasToScroll() &&
        (stickyElement.scrollTop < (jQuery(stickyElementInner).outerHeight(true) - jQuery(stickyElement).outerHeight(true)))
      ) {
        stickyElement.scrollTop += deltaScrollDistance; // Update stickyElement scrollTop with delta scroll value
      // Else if we're at the very bottom of the stickyElement's overflow
      } else if (stickyElement.scrollTop === (jQuery(stickyElementInner).outerHeight(true) - jQuery(stickyElement).outerHeight(true))) {
        unlockBodyScroll('up');
        return callback(true); // Run the callback
      } else if (!hasToScroll()) { // If none of the above conditionals are met, we're leaving fixed mode
        unlockBodyScroll('up');
        return callback(); // Run the callback
      }
    }));

  } else {
    return callback(); // Run the callback
  }
}

// Lock body scrolling
var lockBodyScroll = function(scrollPos) {
  if (scrollPos > 0) {
    Waypoint.disableAll();
    var cssTop = (scrollPos * -1) + 'px';
    document.body.style.overflowY = 'scroll';
    document.body.style.position = 'fixed';
    document.body.style.top = cssTop;
    Waypoint.enableAll();
  }
}

// Unlock body scrolling
var unlockBodyScroll = function(direction) {
  Waypoint.disableAll();
  var cssTop = parseInt(document.body.style.top);
  cssTop = cssTop < 0 ? cssTop * -1 : cssTop;
  document.body.style.removeProperty('position');
  document.body.style.removeProperty('overflow-y');
  document.body.style.removeProperty('top');
  jQuery(window).off('wheel');
  if (cssTop && direction) {
    jQuery(window).scrollTop(direction == 'up' ? cssTop + 1 : cssTop - 1);
  }
  Waypoint.enableAll();
}

// Check if a DOM element is taller than viewport height
var tallerThanViewport = function(elem) {
  return jQuery(elem).outerHeight(true) > (window.innerHeight - jQuery('#header').outerHeight(true));
}

// Run disable method on an array of waypoints
var disableMultipleWaypoints = function(waypoints) {
  jQuery.each(waypoints, function(i, waypoint) {
    waypoint.disable();
  })
}
// Run enable method on an array of waypoints
var enableMultipleWaypoints = function(waypoints) {
  jQuery.each(waypoints, function(i, waypoint) {
    waypoint.enable();
  })
}


// normalize scroll wheel events
// https://github.com/facebookarchive/fixed-data-table/blob/master/src/vendor_upstream/dom/normalizeWheel.js
// Reasonable defaults
var PIXEL_STEP  = 10;
var LINE_HEIGHT = 40;
var PAGE_HEIGHT = 800;

function normalizeWheel(/*object*/ event) /*object*/ {
  var sX = 0, sY = 0,       // spinX, spinY
      pX = 0, pY = 0;       // pixelX, pixelY

  // Legacy
  if ('detail'      in event) { sY = event.detail; }
  if ('wheelDelta'  in event) { sY = -event.wheelDelta / 120; }
  if ('wheelDeltaY' in event) { sY = -event.wheelDeltaY / 120; }
  if ('wheelDeltaX' in event) { sX = -event.wheelDeltaX / 120; }

  // side scrolling on FF with DOMMouseScroll
  if ( 'axis' in event && event.axis === event.HORIZONTAL_AXIS ) {
    sX = sY;
    sY = 0;
  }

  pX = sX * PIXEL_STEP;
  pY = sY * PIXEL_STEP;

  if ('deltaY' in event) { pY = event.deltaY; }
  if ('deltaX' in event) { pX = event.deltaX; }

  if ((pX || pY) && event.deltaMode) {
    if (event.deltaMode == 1) {          // delta in LINE units
      pX *= LINE_HEIGHT;
      pY *= LINE_HEIGHT;
    } else {                             // delta in PAGE units
      pX *= PAGE_HEIGHT;
      pY *= PAGE_HEIGHT;
    }
  }

  // Fall-back if spin cannot be determined
  if (pX && !sX) { sX = (pX < 1) ? -1 : 1; }
  if (pY && !sY) { sY = (pY < 1) ? -1 : 1; }

  return { spinX  : sX,
           spinY  : sY,
           pixelX : pX,
           pixelY : pY };
}