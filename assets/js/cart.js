if( typeof(Cart) === 'undefined' ) {
	var Cart = function() {}
	Cart.prototype = {
        _isUpdating: false,
        _currentIdItem: 0,
        _totalItemPrice: 0,
		setup: function() {
            // radio button placeholder di cart
            $('.cart__dv__content input').click(function() {
                var parentShipping = $(this).parents('.cart__dv__block').find('.cart__dv__header input');
                parentShipping.attr('checked', 'checked');
                Cart._single.calculateShipping();
            });

            $('.cart__dv__content input:disabled + label').click(function(){
                // get branch with empty stock
                var branch = $(this).attr('data-empty');
                console.log(branch);
                $('[data-stock' + branch + '=1]').addClass('cart__item--sold');

                // animate scroll
                $('html,body').animate({
                    scrollTop: $('[data-stock' + branch + '=1]:first').offset().top
                });

                // delay hilangin class nya
                setTimeout(function() {
                    $('.cart__item').removeClass('cart__item--sold');
                }, 3000);
            });

            // $('.emptyCartOpt li a').hover(function(){
            //     var color = $('span',this).css('background-color');
            //     $('.emptyCartState').animate({'background-color': color}, 300);
            // },function(){
            //     $('.emptyCartState').stop(true, true);
            //     $('.emptyCartState').animate({'background-color': '#eee'}, 300);
            // });

            // $('.cartQty input[type=number]').validate({
            //     errorElement: 'span',
            //     rules: {

            //         required: true,
            //         max: 99
            //     },
            //     messages: {

            //     }
            // });
		},

        resetActiveCartItem: function() {
            var o = Cart._single;
            o._isUpdating = false;
            o._currentIdItem = 0;
        },

        updateQty : function(obj, itemId) {
            var newQty = $(obj).val().trim();
            var msgCont = $('#action-msg-' + itemId);
            var currentValue = $('#current-value-' + itemId).val();

            // Max item 99 in cart
            if(false && newQty>99) {
                $(obj).val(currentValue);
                // $('#error-cart-' + itemId).html('Gagal update jumlah barang di dalam keranjang Anda. Silakan menghubungi Sales JakartaNotebook.com untuk pemesanan dengan jumlah di atas 99 unit.');
                // $('#error-cart-' + itemId).removeClass('visuallyHidden');
            }
            else {
                if(newQty!=currentValue) {
                    if(newQty == "" || isNaN(newQty)) {
                        msgCont.html("<label style='color:red'>Invalid input for Qty</label>");
                        Cart._single.resetActiveCartItem();
                    }
                    else {
                        Ajax.request('transaction','edit_cart',{ item: itemId, qty: newQty }, msgCont, 'Updating ', function(result) {
                            if(result.success) {
                                msgCont.html("<label style='color: green;'>Success. Refreshing...</label>")
                                setTimeout(function() {
                                  window.location = base_url + "transaction/cart";
                                }, 1000);
                            }
                            else {
                                msgCont.html("<label style='color: red;'>" + result.message + "</label>");
                            }

                            setTimeout(function() {
                              window.location = base_url + "transaction/cart";
                            }, 1000);

                            Cart._single.resetActiveCartItem();
                        }, null, [ $(obj), $('#bcheck') ]);
                    }
                }
                else {
                    Cart._single.resetActiveCartItem();
                }
            }
        },

        qtyFocus : function(itemId) {
            var o = Cart._single;
            o._isUpdating = true;
            o._currentIdItem = itemId;
        },
        confirmation: function(type) {
            // allowed type
            if(type!='save' && type!='empty') return false;

            var answer = confirm(type=='save'?'Apakah Anda yakin untuk menyimpan keranjang belanja ini ke dalam simpanan keranjang belanja (Saved Cart)?':'Apakah Anda yakin menghapus semua barang di dalam keranjang belanja?')
            return answer;
        },
        disable: function(el) {
            var o = Cart._single;
            if(o._isUpdating) {
                if($('#current-value-' + o._currentIdItem).val() + ' ' + $('#value-' + o._currentIdItem).val()) {
                    alert('Sorry, we are currently updating your item quantity');
                    return false;
                }
            }
            $(el).attr('disabled', 'disabled');
            $(el).addClass('disabled');
            $(el).addClass('is-disabled');
            return true;
        },

        calculateShipping: function() {
            var o = Cart._single;

            var checkedOption = $('input[name=shipping-sub]:checked', '#cart-form');
            var charge = checkedOption.attr('data-charge');
            if(typeof(charge) == 'undefined') {
                charge = 0;
            }

            charge = parseInt(charge);

            if(charge > 0) {
                $('#cart-charge-name').html(checkedOption.attr('data-charge-name'));
                $('#cart-charge').html('<span>Rp. </span>' + charge.formatMoney(0));
                $('#cart-charge-container').show();
            }
            else {
                $('#cart-charge-name').empty();
                $('#cart-charge').empty();
                $('#cart-charge-container').hide();
            }

            $('#cart-total-price').html((o._totalItemPrice + charge).formatMoney(0));
        }
	}

	Cart._single = new Cart();
    
    Cart.setup = function() { Cart._single.setup(); }
    Cart.updateQty = function(obj, itemId) { Cart._single.updateQty(obj, itemId); }
    Cart.qtyFocus = function(itemId) { Cart._single.qtyFocus(itemId); }
    Cart.checkOut = function(el) { Cart._single.checkOut(el); }
    Cart.confirmation = function(type) { return Cart._single.confirmation(type); }
    Cart.disable = function(el) { return Cart._single.disable(el); }
    Cart.calculateShipping = function() { Cart._single.calculateShipping(); } 
}