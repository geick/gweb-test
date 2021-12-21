$(document).ready(function() {
    const datepicker = require('js-datepicker')

    if ($('.create-project-form').length) {
        // Toggle fields depending on specific project type
        $('.select-project-type').change(function(event) {
            if ($(event.target).find('option:selected').text() === 'GzA') {
                $('.toggled-liability-field').show();
            } else {
                $('.toggled-liability-field').hide();
            }
        });

        // Cause default check when form is loaded
        $('.select-project-type').trigger('change');

        startDate = datepicker('.create-project-form .start-date');
        endDate = datepicker('.create-project-form .end-date');
    }
});