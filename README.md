# Mbiz_Ajax

This modules adds `AJAX_` handles if the request is performed using ajax call.

It also adds a simple JSON response of the category view.

You have to write your own ajax if you want to make it works.

Javascript example:

```javascript
(function ($) {
  $(document).ready(function () {
    // Catalog Category View
    if ($('.catalog-category-view').length) {

      // If we have a load more button
      var $more = $('.js-load-more');
      if ($more.length) {

        // On click on this button
        $more.click(function () {

          // Call the next page url in ajax
          var pagerData = {};
          pagerData[$more.attr('data-page-var-name')] = $more.attr('data-next-page');
          $.getJSON(
            {
              url: $more.attr('data-url'),
              dataType: 'json',
              data: pagerData,
              success: function (data) {

                // Disable if last page
                if (data.is_last_page) {
                  $more
                    .attr('disabled', true)
                    .addClass('disabled')
                  ;
                }

                // Insert products
                $('.product-list').append(data.body);

                // Update next page
                $more.attr('data-next-page', data.next_page);
              }
            }
          );

        });
      }
    }
  });
})(jQuery);
```

You can also use the handles to perform some updates on the page in ajax mode.

Example:

```xml
<AJAX_catalog_category_view>
    <reference name="product_list">
        <!-- Change template of the product list -->
        <action method="setTemplate">
            <template>catalog/product/list_ajax.phtml</template>
        </action>
    </reference>
</AJAX_catalog_category_view>
```

