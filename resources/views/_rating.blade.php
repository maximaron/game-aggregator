<script>
    document.addEventListener('DOMContentLoaded', function () {
        var container = document.getElementById('{{$slug }}');

        var bar = new ProgressBar.Circle(container, {
            color: 'white',
            strokeWidth: 6,
            trailWidth: 4,
            trailColor: '#4B5563',
            easing: 'easeInOut',
            duration: 2500,
            text: {
                autoStyleContainer: false
            },
            from: { color: '#48BB78', width: 6 },
            to: { color: '#48BB78', width: 6 },
            step: function (state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.path.setAttribute('stroke-width', state.width);

                var value = Math.round(circle.value() * 100);
                if (value === 0) {
                    circle.setText('0%');
                } else {
                    circle.setText(value + '%');
                }
            }
        });

        var rating = parseFloat({{ $rating }}) / 100;
        bar.animate(rating);
    });
</script>
