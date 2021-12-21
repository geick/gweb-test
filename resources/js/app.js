$(document).ready(function() {
    if ($('.project-form').length) {
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

        const startPicker = datepicker('.project-form .start-date', {
            startDay: 1,
            formatter: (input, date, instance) => {
                const value = date.toLocaleDateString('de-DE');
                input.value = value;
            },
        });

        const endPicker = datepicker('.project-form .end-date', {
            startDay: 1,
            formatter: (input, date, instance) => {
                const value = date.toLocaleDateString('de-DE');
                input.value = value;
            },
        });
    }
});