/**
 * Created by mario.cuevas on 6/27/2016.
 */
// Show tooltip on bottom (default)
$(document).ready(function(){
    $('[title]').qtip({
        style: {
            classes: 'ui-tooltip-tipsy ui-tooltip-rounded'
        },
        position: {
            my: 'top center',  // Position my top center...
            at: 'bottom center', // at the bottom center of...
            target: 'mouse',
            adjust: {
                mouse: true,  // Can be omitted (e.g. default behaviour)
                y: 25
            }
        }
    });
});

// Show tooltip on top
$(document).ready(function(){
    $('.payments-icons img').qtip({
        style: {
            classes: 'ui-tooltip-tipsy ui-tooltip-rounded'
        },
        position: {
            my: 'bottom center',  // Position my bottom center...
            at: 'top center', // at the top center of...
            target: 'mouse',
            adjust: {
                mouse: true,  // Can be omitted (e.g. default behaviour)
                y: -10
            }
        }
    });
});
