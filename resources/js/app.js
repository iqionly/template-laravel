import 'bootstrap';

import './color-mode.js';
import './image-uploader.js';

import 'axios';
import axios from 'axios';

/* globals Chart:false */

(() => {
    'use strict'

    // Graphs
    const ctx = document.getElementById('myChart')
    // eslint-disable-next-line no-unused-vars
    if(ctx) {
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    'Sunday',
                    'Monday',
                    'Tuesday',
                    'Wednesday',
                    'Thursday',
                    'Friday',
                    'Saturday'
                ],
                datasets: [{
                    data: [
                        15339,
                        21345,
                        18483,
                        24003,
                        23489,
                        24092,
                        12034
                    ],
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    borderWidth: 4,
                    pointBackgroundColor: '#007bff'
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        boxPadding: 3
                    }
                }
            }
        })
    }

    let userProfile = axios.get(APP_URL + '/user/profile')
        .then(response => {
            let preloaded = [
                {id: 1, src: response.data.photos},
            ];
        
            $('.input-images').imageUploader({
                preloaded: preloaded,
                imagesInputName: 'profile_photos',
                preloadedInputName: 'old',
                maxSize: 0.5 * 1024 * 1024,
                maxFiles: 1
            });
        })
        .catch(error => {
            console.error(error);
        });

    let searchDelay;

    let navbarSearch = $('#navbarSearch').on('keyup', 'input', function(e, x, i) {
        let query = $(this).val();
        let url = APP_URL + '/search';

        // Do search if it not backspace
        // if(e.key === 'Backspace') {
        clearTimeout(searchDelay);
        if(e.key !== 'Backspace') {
            searchDelay = setTimeout(() => {
                if(query.length > 0) {
                    console.log('Searching for: ' + query);
                } else {
                    
                }
            }, 300);
        } else {
            searchDelay = setTimeout(() => {
                if(query.length > 0) {
                    console.log('Searched after no key specify, query: ' + query);
                } else {
                    
                }
            }, 400);
        }
    });
})(jQuery)
