<?php $request = app('Illuminate\Http\Request'); ?>

<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p> -->
          <!-- Status -->
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> -->

      <!-- search form (Optional) -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">

        <!-- Call superadmin module if defined -->
        <?php if(Module::has('Superadmin')): ?>
          <?php echo $__env->make('superadmin::layouts.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        
        <!-- call Essentials module if defined -->
        <?php if(Module::has('Essentials')): ?>
          <?php echo $__env->make('essentials::layouts.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        <!-- <li class="header">HEADER</li> -->
        <li class="<?php echo e($request->segment(1) == 'home' ? 'active' : ''); ?>">
          <a href="<?php echo e(action('HomeController@index')); ?>">
            <i class="fa fa-dashboard"></i> <span>
            <?php echo e(app('translator')->getFromJson('home.home')); ?></span>
          </a>
        </li>
        <?php if(auth()->user()->can('user.view') || auth()->user()->can('user.create') || auth()->user()->can('roles.view')): ?>
        <li class="treeview <?php echo e(in_array($request->segment(1), ['roles', 'users', 'sales-commission-agents']) ? 'active active-sub' : ''); ?>">
            <a href="#">
                <i class="fa fa-users"></i>
                <span class="title"><?php echo e(app('translator')->getFromJson('user.user_management')); ?></span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check( 'user.view' )): ?>
                <li class="<?php echo e($request->segment(1) == 'users' ? 'active active-sub' : ''); ?>">
                  <a href="<?php echo e(action('ManageUserController@index')); ?>">
                      <i class="fa fa-user"></i>
                      <span class="title">
                          <?php echo e(app('translator')->getFromJson('user.users')); ?>
                      </span>
                  </a>
                </li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.view')): ?>
                <li class="<?php echo e($request->segment(1) == 'roles' ? 'active active-sub' : ''); ?>">
                  <a href="<?php echo e(action('RoleController@index')); ?>">
                      <i class="fa fa-briefcase"></i>
                      <span class="title">
                        <?php echo e(app('translator')->getFromJson('user.roles')); ?>
                      </span>
                  </a>
                </li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.create')): ?>
                <li class="<?php echo e($request->segment(1) == 'sales-commission-agents' ? 'active active-sub' : ''); ?>">
                  <a href="<?php echo e(action('SalesCommissionAgentController@index')); ?>">
                      <i class="fa fa-handshake-o"></i>
                      <span class="title">
                        <?php echo e(app('translator')->getFromJson('lang_v1.sales_commission_agents')); ?>
                      </span>
                  </a>
                </li>
              <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php if(auth()->user()->can('supplier.view') || auth()->user()->can('customer.view') ): ?>
          <li class="treeview <?php echo e(in_array($request->segment(1), ['contacts', 'customer-group']) ? 'active active-sub' : ''); ?>" id="tour_step4">
            <a href="#" id="tour_step4_menu"><i class="fa fa-address-book"></i> <span><?php echo e(app('translator')->getFromJson('contact.contacts')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supplier.view')): ?>
                <li class="<?php echo e($request->input('type') == 'supplier' ? 'active' : ''); ?>"><a href="<?php echo e(action('ContactController@index', ['type' => 'supplier'])); ?>"><i class="fa fa-star"></i> <?php echo e(app('translator')->getFromJson('report.supplier')); ?></a></li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer.view')): ?>
                <li class="<?php echo e($request->input('type') == 'customer' ? 'active' : ''); ?>"><a href="<?php echo e(action('ContactController@index', ['type' => 'customer'])); ?>"><i class="fa fa-star"></i> <?php echo e(app('translator')->getFromJson('report.customer')); ?></a></li>

                <li class="<?php echo e($request->segment(1) == 'customer-group' ? 'active' : ''); ?>"><a href="<?php echo e(action('CustomerGroupController@index')); ?>"><i class="fa fa-users"></i> <?php echo e(app('translator')->getFromJson('lang_v1.customer_groups')); ?></a></li>
              <?php endif; ?>

              <?php if(auth()->user()->can('supplier.create') || auth()->user()->can('customer.create') ): ?>
                <li class="<?php echo e($request->segment(1) == 'contacts' && $request->segment(2) == 'import' ? 'active' : ''); ?>"><a href="<?php echo e(action('ContactController@getImportContacts')); ?>"><i class="fa fa-download"></i> <?php echo e(app('translator')->getFromJson('lang_v1.import_contacts')); ?></a></li>
              <?php endif; ?>

            </ul>
          </li>
        <?php endif; ?>

        <?php if(auth()->user()->can('product.view') || 
        auth()->user()->can('product.create') || 
        auth()->user()->can('brand.view') ||
        auth()->user()->can('unit.view') ||
        auth()->user()->can('category.view') ||
        auth()->user()->can('brand.create') ||
        auth()->user()->can('unit.create') ||
        auth()->user()->can('category.create') ): ?>
          <li class="treeview <?php echo e(in_array($request->segment(1), ['variation-templates', 'products', 'labels', 'import-products', 'import-opening-stock', 'selling-price-group', 'brands', 'units', 'categories']) ? 'active active-sub' : ''); ?>" id="tour_step5">
            <a href="#" id="tour_step5_menu"><i class="fa fa-cubes"></i> <span><?php echo e(app('translator')->getFromJson('sale.products')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.view')): ?>
                <li class="<?php echo e($request->segment(1) == 'products' && $request->segment(2) == '' ? 'active' : ''); ?>"><a href="<?php echo e(action('ProductController@index')); ?>"><i class="fa fa-list"></i><?php echo e(app('translator')->getFromJson('lang_v1.list_products')); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.create')): ?>
                <li class="<?php echo e($request->segment(1) == 'products' && $request->segment(2) == 'create' ? 'active' : ''); ?>"><a href="<?php echo e(action('ProductController@create')); ?>"><i class="fa fa-plus-circle"></i><?php echo e(app('translator')->getFromJson('product.add_product')); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.view')): ?>
                <li class="<?php echo e($request->segment(1) == 'labels' && $request->segment(2) == 'show' ? 'active' : ''); ?>"><a href="<?php echo e(action('LabelsController@show')); ?>"><i class="fa fa-barcode"></i><?php echo e(app('translator')->getFromJson('barcode.print_labels')); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.create')): ?>
                <li class="<?php echo e($request->segment(1) == 'variation-templates' ? 'active' : ''); ?>"><a href="<?php echo e(action('VariationTemplateController@index')); ?>"><i class="fa fa-circle-o"></i><span><?php echo e(app('translator')->getFromJson('product.variations')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.create')): ?>
                <li class="<?php echo e($request->segment(1) == 'import-products' ? 'active' : ''); ?>"><a href="<?php echo e(action('ImportProductsController@index')); ?>"><i class="fa fa-download"></i><span><?php echo e(app('translator')->getFromJson('product.import_products')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.opening_stock')): ?>
                <li class="<?php echo e($request->segment(1) == 'import-opening-stock' ? 'active' : ''); ?>"><a href="<?php echo e(action('ImportOpeningStockController@index')); ?>"><i class="fa fa-download"></i><span><?php echo e(app('translator')->getFromJson('lang_v1.import_opening_stock')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.create')): ?>
                <li class="<?php echo e($request->segment(1) == 'selling-price-group' ? 'active' : ''); ?>"><a href="<?php echo e(action('SellingPriceGroupController@index')); ?>"><i class="fa fa-circle-o"></i><span><?php echo e(app('translator')->getFromJson('lang_v1.selling_price_group')); ?></span></a></li>
              <?php endif; ?>
              
              <?php if(auth()->user()->can('unit.view') || auth()->user()->can('unit.create')): ?>
                <li class="<?php echo e($request->segment(1) == 'units' ? 'active' : ''); ?>">
                  <a href="<?php echo e(action('UnitController@index')); ?>"><i class="fa fa-balance-scale"></i> <span><?php echo e(app('translator')->getFromJson('unit.units')); ?></span></a>
                </li>
              <?php endif; ?>

              <?php if(auth()->user()->can('category.view') || auth()->user()->can('category.create')): ?>
                <li class="<?php echo e($request->segment(1) == 'categories' ? 'active' : ''); ?>">
                  <a href="<?php echo e(action('CategoryController@index')); ?>"><i class="fa fa-tags"></i> <span><?php echo e(app('translator')->getFromJson('category.categories')); ?> </span></a>
                </li>
              <?php endif; ?>

              <?php if(auth()->user()->can('brand.view') || auth()->user()->can('brand.create')): ?>
                <li class="<?php echo e($request->segment(1) == 'brands' ? 'active' : ''); ?>">
                  <a href="<?php echo e(action('BrandController@index')); ?>"><i class="fa fa-diamond"></i> <span><?php echo e(app('translator')->getFromJson('brand.brands')); ?></span></a>
                </li>
              <?php endif; ?>
            </ul>
          </li>
        <?php endif; ?>
        <?php if(auth()->user()->can('purchase.view') || auth()->user()->can('purchase.create') || auth()->user()->can('purchase.update') ): ?>
        <li class="treeview <?php echo e(in_array($request->segment(1), ['purchases', 'purchase-return']) ? 'active active-sub' : ''); ?>" id="tour_step6">
          <a href="#" id="tour_step6_menu"><i class="fa fa-arrow-circle-down"></i> <span><?php echo e(app('translator')->getFromJson('purchase.purchases')); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.view')): ?>
              <li class="<?php echo e($request->segment(1) == 'purchases' && $request->segment(2) == null ? 'active' : ''); ?>"><a href="<?php echo e(action('PurchaseController@index')); ?>"><i class="fa fa-list"></i><?php echo e(app('translator')->getFromJson('purchase.list_purchase')); ?></a></li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.create')): ?>
              <li class="<?php echo e($request->segment(1) == 'purchases' && $request->segment(2) == 'create' ? 'active' : ''); ?>"><a href="<?php echo e(action('PurchaseController@create')); ?>"><i class="fa fa-plus-circle"></i> <?php echo e(app('translator')->getFromJson('purchase.add_purchase')); ?></a></li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.update')): ?>
              <li class="<?php echo e($request->segment(1) == 'purchase-return' ? 'active' : ''); ?>"><a href="<?php echo e(action('PurchaseReturnController@index')); ?>"><i class="fa fa-undo"></i> <?php echo e(app('translator')->getFromJson('lang_v1.list_purchase_return')); ?></a></li>
            <?php endif; ?>
          </ul>
        </li>
        <?php endif; ?>

        <?php if(auth()->user()->can('sell.view') || auth()->user()->can('sell.create') || auth()->user()->can('direct_sell.access') ): ?>
          <li class="treeview <?php echo e(in_array( $request->segment(1), ['sells', 'pos', 'sell-return']) ? 'active active-sub' : ''); ?>" id="tour_step7">
            <a href="#" id="tour_step7_menu"><i class="fa fa-arrow-circle-up"></i> <span><?php echo e(app('translator')->getFromJson('sale.sale')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('direct_sell.access')): ?>
                <li class="<?php echo e($request->segment(1) == 'sells' && $request->segment(2) == null ? 'active' : ''); ?>" ><a href="<?php echo e(action('SellController@index')); ?>"><i class="fa fa-list"></i><?php echo e(app('translator')->getFromJson('lang_v1.all_sales')); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('direct_sell.access')): ?>
                <li class="<?php echo e($request->segment(1) == 'sells' && $request->segment(2) == 'create' ? 'active' : ''); ?>"><a href="<?php echo e(action('SellController@create')); ?>"><i class="fa fa-plus-circle"></i><?php echo e(app('translator')->getFromJson('sale.add_sale')); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.view')): ?>
                <li class="<?php echo e($request->segment(1) == 'pos' && $request->segment(2) == null ? 'active' : ''); ?>" ><a href="<?php echo e(action('SellPosController@index')); ?>"><i class="fa fa-list"></i><?php echo e(app('translator')->getFromJson('sale.list_pos')); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.create')): ?>
                <li class="<?php echo e($request->segment(1) == 'pos' && $request->segment(2) == 'create' ? 'active' : ''); ?>"><a href="<?php echo e(action('SellPosController@create')); ?>"><i class="fa fa-plus-circle"></i><?php echo e(app('translator')->getFromJson('sale.pos_sale')); ?></a></li>
                <li class="<?php echo e($request->segment(1) == 'sells' && $request->segment(2) == 'drafts' ? 'active' : ''); ?>" ><a href="<?php echo e(action('SellController@getDrafts')); ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i><?php echo e(app('translator')->getFromJson('lang_v1.list_drafts')); ?></a></li>

                <li class="<?php echo e($request->segment(1) == 'sells' && $request->segment(2) == 'quotations' ? 'active' : ''); ?>" ><a href="<?php echo e(action('SellController@getQuotations')); ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i><?php echo e(app('translator')->getFromJson('lang_v1.list_quotations')); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.view')): ?>
                <li class="<?php echo e($request->segment(1) == 'sell-return' && $request->segment(2) == null ? 'active' : ''); ?>" ><a href="<?php echo e(action('SellReturnController@index')); ?>"><i class="fa fa-undo"></i><?php echo e(app('translator')->getFromJson('lang_v1.list_sell_return')); ?></a></li>
              <?php endif; ?>
            </ul>
          </li>
        <?php endif; ?>

        <?php if(auth()->user()->can('purchase.view') || auth()->user()->can('purchase.create') ): ?>
        <li class="treeview <?php echo e($request->segment(1) == 'stock-transfers' ? 'active active-sub' : ''); ?>">
          <a href="#"><i class="fa fa-truck" aria-hidden="true"></i> <span><?php echo e(app('translator')->getFromJson('lang_v1.stock_transfers')); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.view')): ?>
              <li class="<?php echo e($request->segment(1) == 'stock-transfers' && $request->segment(2) == null ? 'active' : ''); ?>"><a href="<?php echo e(action('StockTransferController@index')); ?>"><i class="fa fa-list"></i><?php echo e(app('translator')->getFromJson('lang_v1.list_stock_transfers')); ?></a></li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.create')): ?>
              <li class="<?php echo e($request->segment(1) == 'stock-transfers' && $request->segment(2) == 'create' ? 'active' : ''); ?>"><a href="<?php echo e(action('StockTransferController@create')); ?>"><i class="fa fa-plus-circle"></i><?php echo e(app('translator')->getFromJson('lang_v1.add_stock_transfer')); ?></a></li>
            <?php endif; ?>
          </ul>
        </li>
        <?php endif; ?>

        <?php if(auth()->user()->can('purchase.view') || auth()->user()->can('purchase.create') ): ?>
        <li class="treeview <?php echo e($request->segment(1) == 'stock-adjustments' ? 'active active-sub' : ''); ?>">
          <a href="#"><i class="fa fa-database" aria-hidden="true"></i> <span><?php echo e(app('translator')->getFromJson('stock_adjustment.stock_adjustment')); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.view')): ?>
              <li class="<?php echo e($request->segment(1) == 'stock-adjustments' && $request->segment(2) == null ? 'active' : ''); ?>"><a href="<?php echo e(action('StockAdjustmentController@index')); ?>"><i class="fa fa-list"></i><?php echo e(app('translator')->getFromJson('stock_adjustment.list')); ?></a></li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.create')): ?>
              <li class="<?php echo e($request->segment(1) == 'stock-adjustments' && $request->segment(2) == 'create' ? 'active' : ''); ?>"><a href="<?php echo e(action('StockAdjustmentController@create')); ?>"><i class="fa fa-plus-circle"></i><?php echo e(app('translator')->getFromJson('stock_adjustment.add')); ?></a></li>
            <?php endif; ?>
          </ul>
        </li>
        <?php endif; ?>

        <?php if(auth()->user()->can('expense.access')): ?>
        <li class="treeview <?php echo e(in_array( $request->segment(1), ['expense-categories', 'expenses']) ? 'active active-sub' : ''); ?>">
          <a href="#"><i class="fa fa-minus-circle"></i> <span><?php echo e(app('translator')->getFromJson('expense.expenses')); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo e($request->segment(1) == 'expenses' && empty($request->segment(2)) ? 'active' : ''); ?>"><a href="<?php echo e(action('ExpenseController@index')); ?>"><i class="fa fa-list"></i><?php echo e(app('translator')->getFromJson('lang_v1.list_expenses')); ?></a></li>
            <li class="<?php echo e($request->segment(1) == 'expenses' && $request->segment(2) == 'create' ? 'active' : ''); ?>"><a href="<?php echo e(action('ExpenseController@create')); ?>"><i class="fa fa-plus-circle"></i><?php echo e(app('translator')->getFromJson('messages.add')); ?> <?php echo e(app('translator')->getFromJson('expense.expenses')); ?></a></li>
            <li class="<?php echo e($request->segment(1) == 'expense-categories' ? 'active' : ''); ?>"><a href="<?php echo e(action('ExpenseCategoryController@index')); ?>"><i class="fa fa-circle-o"></i><?php echo e(app('translator')->getFromJson('expense.expense_categories')); ?></a></li>
          </ul>
        </li>
        <?php endif; ?>

        <?php if(auth()->user()->can('purchase_n_sell_report.view') 
          || auth()->user()->can('contacts_report.view') 
          || auth()->user()->can('stock_report.view') 
          || auth()->user()->can('tax_report.view') 
          || auth()->user()->can('trending_product_report.view') 
          || auth()->user()->can('sales_representative.view') 
          || auth()->user()->can('register_report.view')
          || auth()->user()->can('expense_report.view')
          ): ?>

          <li class="treeview <?php echo e(in_array( $request->segment(1), ['reports']) ? 'active active-sub' : ''); ?>" id="tour_step8">
            <a href="#" id="tour_step8_menu"><i class="fa fa-bar-chart-o"></i> <span><?php echo e(app('translator')->getFromJson('report.reports')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('profit_loss_report.view')): ?>
                <li class="<?php echo e($request->segment(2) == 'profit-loss' ? 'active' : ''); ?>" ><a href="<?php echo e(action('ReportController@getProfitLoss')); ?>"><i class="fa fa-money"></i><?php echo e(app('translator')->getFromJson('report.profit_loss')); ?></a></li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_n_sell_report.view')): ?>
                <li class="<?php echo e($request->segment(2) == 'purchase-sell' ? 'active' : ''); ?>" ><a href="<?php echo e(action('ReportController@getPurchaseSell')); ?>"><i class="fa fa-exchange"></i><?php echo e(app('translator')->getFromJson('report.purchase_sell_report')); ?></a></li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tax_report.view')): ?>
                <li class="<?php echo e($request->segment(2) == 'tax-report' ? 'active' : ''); ?>" ><a href="<?php echo e(action('ReportController@getTaxReport')); ?>"><i class="fa fa-tumblr" aria-hidden="true"></i><?php echo e(app('translator')->getFromJson('report.tax_report')); ?></a></li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contacts_report.view')): ?>
                <li class="<?php echo e($request->segment(2) == 'customer-supplier' ? 'active' : ''); ?>" ><a href="<?php echo e(action('ReportController@getCustomerSuppliers')); ?>"><i class="fa fa-address-book"></i><?php echo e(app('translator')->getFromJson('report.contacts')); ?></a></li>

                <li class="<?php echo e($request->segment(2) == 'customer-group' ? 'active' : ''); ?>" ><a href="<?php echo e(action('ReportController@getCustomerGroup')); ?>"><i class="fa fa-users"></i><?php echo e(app('translator')->getFromJson('lang_v1.customer_groups_report')); ?></a></li>
              <?php endif; ?>
              
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stock_report.view')): ?>
                <li class="<?php echo e($request->segment(2) == 'stock-report' ? 'active' : ''); ?>" ><a href="<?php echo e(action('ReportController@getStockReport')); ?>"><i class="fa fa-hourglass-half" aria-hidden="true"></i><?php echo e(app('translator')->getFromJson('report.stock_report')); ?></a></li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stock_report.view')): ?>
                <?php if(session('business.enable_product_expiry') == 1): ?>
                <li class="<?php echo e($request->segment(2) == 'stock-expiry' ? 'active' : ''); ?>" ><a href="<?php echo e(action('ReportController@getStockExpiryReport')); ?>"><i class="fa fa-calendar-times-o"></i><?php echo e(app('translator')->getFromJson('report.stock_expiry_report')); ?></a></li>
                <?php endif; ?>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stock_report.view')): ?>
                <li class="<?php echo e($request->segment(2) == 'lot-report' ? 'active' : ''); ?>" ><a href="<?php echo e(action('ReportController@getLotReport')); ?>"><i class="fa fa-hourglass-half" aria-hidden="true"></i><?php echo e(app('translator')->getFromJson('lang_v1.lot_report')); ?></a></li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('trending_product_report.view')): ?>
                <li class="<?php echo e($request->segment(2) == 'trending-products' ? 'active' : ''); ?>" ><a href="<?php echo e(action('ReportController@getTrendingProducts')); ?>"><i class="fa fa-line-chart" aria-hidden="true"></i><?php echo e(app('translator')->getFromJson('report.trending_products')); ?></a></li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stock_report.view')): ?>
                <li class="<?php echo e($request->segment(2) == 'stock-adjustment-report' ? 'active' : ''); ?>" ><a href="<?php echo e(action('ReportController@getStockAdjustmentReport')); ?>"><i class="fa fa-sliders"></i><?php echo e(app('translator')->getFromJson('report.stock_adjustment_report')); ?></a></li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_n_sell_report.view')): ?>
                <li class="<?php echo e($request->segment(2) == 'product-purchase-report' ? 'active' : ''); ?>" ><a href="<?php echo e(action('ReportController@getproductPurchaseReport')); ?>"><i class="fa fa-arrow-circle-down"></i><?php echo e(app('translator')->getFromJson('lang_v1.product_purchase_report')); ?></a></li>

                <li class="<?php echo e($request->segment(2) == 'product-sell-report' ? 'active' : ''); ?>" ><a href="<?php echo e(action('ReportController@getproductSellReport')); ?>"><i class="fa fa-arrow-circle-up"></i><?php echo e(app('translator')->getFromJson('lang_v1.product_sell_report')); ?></a></li>

                <li class="<?php echo e($request->segment(2) == 'purchase-payment-report' ? 'active' : ''); ?>" ><a href="<?php echo e(action('ReportController@purchasePaymentReport')); ?>"><i class="fa fa-money"></i><?php echo e(app('translator')->getFromJson('lang_v1.purchase_payment_report')); ?></a></li>

                <li class="<?php echo e($request->segment(2) == 'sell-payment-report' ? 'active' : ''); ?>" ><a href="<?php echo e(action('ReportController@sellPaymentReport')); ?>"><i class="fa fa-money"></i><?php echo e(app('translator')->getFromJson('lang_v1.sell_payment_report')); ?></a></li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense_report.view')): ?>
                <li class="<?php echo e($request->segment(2) == 'expense-report' ? 'active' : ''); ?>" ><a href="<?php echo e(action('ReportController@getExpenseReport')); ?>"><i class="fa fa-search-minus" aria-hidden="true"></i></i><?php echo e(app('translator')->getFromJson('report.expense_report')); ?></a></li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('register_report.view')): ?>
                <li class="<?php echo e($request->segment(2) == 'register-report' ? 'active' : ''); ?>" ><a href="<?php echo e(action('ReportController@getRegisterReport')); ?>"><i class="fa fa-briefcase"></i><?php echo e(app('translator')->getFromJson('report.register_report')); ?></a></li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sales_representative.view')): ?>
                <li class="<?php echo e($request->segment(2) == 'sales-representative-report' ? 'active' : ''); ?>" ><a href="<?php echo e(action('ReportController@getSalesRepresentativeReport')); ?>"><i class="fa fa-user" aria-hidden="true"></i><?php echo e(app('translator')->getFromJson('report.sales_representative')); ?></a></li>
              <?php endif; ?>

              <?php if(in_array('tables', $enabled_modules)): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_n_sell_report.view')): ?>
                  <li class="<?php echo e($request->segment(2) == 'table-report' ? 'active' : ''); ?>" ><a href="<?php echo e(action('ReportController@getTableReport')); ?>"><i class="fa fa-table"></i><?php echo e(app('translator')->getFromJson('restaurant.table_report')); ?></a></li>
                <?php endif; ?>
              <?php endif; ?>
              <?php if(in_array('service_staff', $enabled_modules)): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sales_representative.view')): ?>
                <li class="<?php echo e($request->segment(2) == 'service-staff-report' ? 'active' : ''); ?>" ><a href="<?php echo e(action('ReportController@getServiceStaffReport')); ?>"><i class="fa fa-user-secret"></i><?php echo e(app('translator')->getFromJson('restaurant.service_staff_report')); ?></a></li>
                <?php endif; ?>
              <?php endif; ?>

            </ul>
          </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backup')): ?>
          <li class="treeview <?php echo e(in_array( $request->segment(1), ['backup']) ? 'active active-sub' : ''); ?>">
              <a href="<?php echo e(action('BackUpController@index')); ?>"><i class="fa fa-dropbox"></i> <span><?php echo e(app('translator')->getFromJson('lang_v1.backup')); ?></span>
              </a>
          </li>
        <?php endif; ?>

        <!-- Call restaurant module if defined -->
        <?php if(in_array('tables', $enabled_modules) && in_array('service_staff', $enabled_modules) ): ?>
          <?php if(auth()->user()->can('crud_all_bookings') || auth()->user()->can('crud_own_bookings') ): ?>
          <li class="treeview <?php echo e($request->segment(1) == 'bookings'? 'active active-sub' : ''); ?>">
              <a href="<?php echo e(action('Restaurant\BookingController@index')); ?>"><i class="fa fa-calendar-check-o"></i> <span><?php echo e(app('translator')->getFromJson('restaurant.bookings')); ?></span></a>
          </li>
          <?php endif; ?>
        <?php endif; ?>

        <?php if(in_array('kitchen', $enabled_modules)): ?>
          <li class="treeview <?php echo e($request->segment(1) == 'modules' && $request->segment(2) == 'kitchen' ? 'active active-sub' : ''); ?>">
              <a href="<?php echo e(action('Restaurant\KitchenController@index')); ?>"><i class="fa fa-fire"></i> <span><?php echo e(app('translator')->getFromJson('restaurant.kitchen')); ?></span></a>
          </li>
        <?php endif; ?>
        <?php if(in_array('service_staff', $enabled_modules)): ?>
          <li class="treeview <?php echo e($request->segment(1) == 'modules' && $request->segment(2) == 'orders' ? 'active active-sub' : ''); ?>">
              <a href="<?php echo e(action('Restaurant\OrderController@index')); ?>"><i class="fa fa-list-alt"></i> <span><?php echo e(app('translator')->getFromJson('restaurant.orders')); ?></span></a>
          </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('send_notifications')): ?>
          <li class="treeview <?php echo e($request->segment(1) == 'notification-templates' ? 'active active-sub' : ''); ?>">
              <a href="<?php echo e(action('NotificationTemplateController@index')); ?>"><i class="fa fa-envelope"></i> <span><?php echo e(app('translator')->getFromJson('lang_v1.notification_templates')); ?></span>
              </a>
          </li>
        <?php endif; ?>
        
        <?php if(auth()->user()->can('business_settings.access') || 
        auth()->user()->can('barcode_settings.access') ||
        auth()->user()->can('invoice_settings.access') ||
        auth()->user()->can('tax_rate.view') ||
        auth()->user()->can('tax_rate.create')): ?>
        
        
        <li class="treeview <?php if( in_array($request->segment(1), ['business', 'tax-rates', 'barcodes', 'invoice-schemes', 'business-location', 'invoice-layouts', 'printers', 'subscription']) || in_array($request->segment(2), ['tables', 'modifiers']) ): ?> <?php echo e('active active-sub'); ?> <?php endif; ?>">
        
          <a href="#" id="tour_step2_menu"><i class="fa fa-cog"></i> <span><?php echo e(app('translator')->getFromJson('business.settings')); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" id="tour_step3">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('business_settings.access')): ?>
              <li class="<?php echo e($request->segment(1) == 'business' ? 'active' : ''); ?>">
                <a href="<?php echo e(action('BusinessController@getBusinessSettings')); ?>" id="tour_step2"><i class="fa fa-cogs"></i> <?php echo e(app('translator')->getFromJson('business.business_settings')); ?></a>
              </li>
              <li class="<?php echo e($request->segment(1) == 'business-location' ? 'active' : ''); ?>" >
                <a href="<?php echo e(action('BusinessLocationController@index')); ?>"><i class="fa fa-map-marker"></i> <?php echo e(app('translator')->getFromJson('business.business_locations')); ?></a>
              </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_settings.access')): ?>
              <li class="<?php if( in_array($request->segment(1), ['invoice-schemes', 'invoice-layouts']) ): ?> <?php echo e('active'); ?> <?php endif; ?>">
                <a href="<?php echo e(action('InvoiceSchemeController@index')); ?>"><i class="fa fa-file"></i> <span><?php echo e(app('translator')->getFromJson('invoice.invoice_settings')); ?></span></a>
              </li>
            <?php endif; ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('barcode_settings.access')): ?>
            <li class="<?php echo e($request->segment(1) == 'barcodes' ? 'active' : ''); ?>">
              <a href="<?php echo e(action('BarcodeController@index')); ?>"><i class="fa fa-barcode"></i> <span><?php echo e(app('translator')->getFromJson('barcode.barcode_settings')); ?></span></a>
            </li>
            <?php endif; ?>

            <li class="<?php echo e($request->segment(1) == 'printers' ? 'active' : ''); ?>">
              <a href="<?php echo e(action('PrinterController@index')); ?>"><i class="fa fa-share-alt"></i> <span><?php echo e(app('translator')->getFromJson('printer.receipt_printers')); ?></span></a>
            </li>

            <?php if(auth()->user()->can('tax_rate.view') || auth()->user()->can('tax_rate.create')): ?>
              <li class="<?php echo e($request->segment(1) == 'tax-rates' ? 'active' : ''); ?>">
                <a href="<?php echo e(action('TaxRateController@index')); ?>"><i class="fa fa-bolt"></i> <span><?php echo e(app('translator')->getFromJson('tax_rate.tax_rates')); ?></span></a>
              </li>
            <?php endif; ?>

            <?php if(in_array('tables', $enabled_modules)): ?>
               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('business_settings.access')): ?>
                <li class="<?php echo e($request->segment(1) == 'modules' && $request->segment(2) == 'tables' ? 'active' : ''); ?>">
                  <a href="<?php echo e(action('Restaurant\TableController@index')); ?>"><i class="fa fa-table"></i> <?php echo e(app('translator')->getFromJson('restaurant.tables')); ?></a>
                </li>
              <?php endif; ?>
            <?php endif; ?>

            <?php if(in_array('modifiers', $enabled_modules)): ?>
              <?php if(auth()->user()->can('product.view') || auth()->user()->can('product.create') ): ?>
                <li class="<?php echo e($request->segment(1) == 'modules' && $request->segment(2) == 'modifiers' ? 'active' : ''); ?>">
                  <a href="<?php echo e(action('Restaurant\ModifierSetsController@index')); ?>"><i class="fa fa-delicious"></i> <?php echo e(app('translator')->getFromJson('restaurant.modifiers')); ?></a>
                </li>
              <?php endif; ?>
            <?php endif; ?>

            <?php if(Module::has('Superadmin')): ?>
              <?php echo $__env->make('superadmin::layouts.partials.subscription', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>

          </ul>
        </li>
        <?php endif; ?>
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('account.access')): ?>
          <?php if(Module::has('Account') && in_array('account', $enabled_modules)): ?>
            <?php echo $__env->make('account::layouts.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php endif; ?>
        <?php endif; ?>

        <?php if(Module::has('Woocommerce')): ?>
          <?php echo $__env->make('woocommerce::layouts.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
      </ul>

      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>