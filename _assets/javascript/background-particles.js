window.onload = function() {

    getInputs();

    Particles.init
    ({

        // normal options
        selector: '.background',
        maxParticles: 300,
        connectParticles: true,
        color: '#808080',

        // options for breakpoints
        responsive: [{

            breakpoint: 768,
            options: {
                maxParticles: 200,
            }
        }, {
            breakpoint: 425,
            options: {
                maxParticles: 100,
                connectParticles: true
            }
        }, {
            breakpoint: 320,
            options: {
                maxParticles: 0

                // disables particles.js
            }
        }
        ]
    });
};