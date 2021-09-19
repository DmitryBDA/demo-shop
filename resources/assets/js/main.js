/*import iconClickHandler from './icon';
import svg4everybody from 'svg4everybody';*/

$('._input_search').on("input", (elem) => {
  let searchFields = $(elem.target).val();

  $.ajax({
    url: "/admin/products",
    type: "GET",
    data: {
      searchFields: searchFields,
    },
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: (data) => {

        $('._ajax_product_list').html(data)
        const url = new URL(window.location);
        url.searchParams.set('searchFields', searchFields);
        history.pushState(null, null, url);
    }
  })
});
