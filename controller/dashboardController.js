$(document).ready(function() {
    $('#bannerSliderId').modal('show');

    $.ajax({
        url: API_URL + "/banner",
        type: 'GET',
        success: function(data) {
            if (data.status === 200 && Array.isArray(data.body)) {
                var indicators = $('#carousel-indicators');
                var inner = $('#carousel-inner');

                data.body.forEach((banner, index) => {
                    var isActive = index === 0 ? 'active' : '';

                    indicators.append(`<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="${index}" class="${isActive}" aria-current="${isActive}" aria-label="Slide ${index + 1}"></button>`);
                    inner.append(`<div class="carousel-item ${isActive}"><img src="${banner.url}" class="d-block w-100" alt="Banner ${index + 1}"></div>`);
                });

                $('#carouselExampleIndicators').carousel({ interval: 3000 });
            } else {
                console.error('Failed to fetch banner images');
            }
        },
        error: function(error) {
            console.error('Error fetching banner images:', error);
        }
    });

    $('#bannerSliderId').on('hidden.bs.modal', function () {
        $('#carouselExampleIndicators').carousel('pause');
    });
});
