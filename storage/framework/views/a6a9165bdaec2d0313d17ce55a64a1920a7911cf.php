<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('Restaurant\ProductModifierSetController@update', [$modifer_set->id]), 'method' => 'post', 'id' => 'table_add_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->getFromJson( 'restaurant.products_for_modifier' ); ?>: <span class="text-success"><?php echo e($modifer_set->name); ?></span>
      </h4>
    </div>

    <div class="modal-body">
      <div class="row">
        
        <div class="col-sm-12">
          <div class="form-group">
            <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.search_product_placeholder' ), 'id' => 'search_product' ]);; ?>

          </div>
        </div>
        
        <div class="col-sm-12">
          <table class="table table-condensed" id="add-modifier-table">
            <thead>
              <tr>
                <th><?php echo app('translator')->getFromJson( 'restaurant.products'); ?></th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $modifer_set->modifier_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($product->name); ?> (<?php echo e($product->sku); ?>)</td>
                  <input type="hidden" name="products[]" value="<?php echo e($product->id); ?>">
                  <td><button type="button" class="btn btn-danger btn-xs remove_modifier_product"><i class="fa fa-close"></i></button></td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson( 'messages.save' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script type="text/javascript">
  $(document).ready(function(){
    $( "#search_product" ).autocomplete({
      source: function(request, response) {
        $.getJSON("/products/list-no-variation", { term: request.term }, response);
      },
      minLength: 2,
      appendTo: "#table_add_form",
      response: function(event,ui) {
        if (ui.content.length == 1)
        {
          ui.item = ui.content[0];
          if(ui.item.qty_available > 0){
            $(this).data('ui-autocomplete')._trigger('select', 'autocompleteselect', ui);
            $(this).autocomplete('close');
          }
        } else if (ui.content.length == 0) {
          swal(LANG.no_products_found)
              .then((value) => {
            $('input#search_product').select();
          });
        }
      },
      select: function( event, ui ) {
        add_product_row(ui.item.product_id);
      }
  })
  .autocomplete( "instance" )._renderItem = function( ul, item ) {
    var string =  "<div>" + item.name;
    string += ' (' + item.sku + ')' + "</div>";
    return $( "<li>" ).append(string).appendTo( ul );
  };
});

function add_product_row(product_id){
  $.ajax({
    method: "GET",
    url: '/modules/product-modifiers/product-row/' + product_id,
    dataType: "html",
    success: function(result){
      $('table#add-modifier-table').append(result);
    }
  });
}
</script>