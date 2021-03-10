let page = window.location.pathname;
let urlParts = page.split("/");
let endUrl = urlParts[urlParts.length - 1];
if (endUrl != "investments") {
    $(function () {

        var api = [];
        // initialize API URLs
        api['investment/ticker'] = ajax_path + "investment/ticker.php";
        api['investment/thread'] = ajax_path + "investment/thread.php";
        api['investment/order'] = ajax_path + "investment/order.php";

        function debounce(callback, delay) {
            let timeout;
            return function () {
                clearTimeout(timeout);
                timeout = setTimeout(callback, delay);
            }
        }
        var timeou_id = "";
        
        updateToken();
        setInterval(updateToken, 30000);
        function updateToken() {
            $.post(api['investment/thread'], { 'order_action_type': 'get_all_tokens_rate' }, function (response) {
                if (response) {
                    $('#wallet_balance').html(response['usd_wallet_amount']);
                    $('#coin_balance').html(response['wallet_coins'][($('#total_coin').attr('placeholder')).toLowerCase()]);
                    wallet_coins = response['wallet_coins'];
                    wallet_coins['usd'] = response['usd_wallet_amount'];
                    buy_details = response.buy_details;
                    sell_details = response.sell_details;
                    updateDetail();
                }
            }, 'json')
                .fail(function (err) {

                })
        }
        var action = $('.btnSectionBuySell').find('a.active').data('actiontype');
        if (action == 'buy') {
            $('#availableBalnce2').hide()
        } else {
            $('#availableBalnce1').hide()
        }
        function updateDetail() {
            let token = ($('#total_coin').attr('placeholder')).toLowerCase();
            if (action == 'buy') {
                $('.per_coin_price').html(buy_details[token]);
                $('.coin_text').html(token.toUpperCase());
                $('#deposit_text').html('Deposit to');
                $(".coinDetailPrice_wallet").each(function () {
                    $(".coinDetailPrice_wallet").each(function () {
                        $(this).find('.priceCount').find('span').html(buy_details[($(this).data('coin').toLowerCase())]);
                    });
                });
                   
              
            } else {
                $('.per_coin_price').html(sell_details[token]);
                $('.coin_text').html(token.toUpperCase());
                $('#deposit_text').html('Withdrawal From');
                $(".coinDetailPrice_wallet").each(function () {
                    $(this).find('.priceCount').find('span').html(sell_details[($(this).data('coin').toLowerCase())]);
                });
                    
                // timeou_id = setTimeout(function () {
                //     change_coin();
                // }, 3000);
            }
            timeou_id = setTimeout(function () {
                change_amount();
            }, 3000);

        }

        var amount = $('#amount');
        var currency = 'USD';
        var symbol = '$';
        var token = $('#total_coin');
        let timeout = null;
        var buying_text = $('#buying_text');
        var order_total = $('#order_total');
        var sub_total = $('#sub_total');
        var total_fees = $('#total_fees');
        var buy_btn = $('#buy_btn');
        var balance_error = " balance is insufficient";
        var wallet_insuficient_error = "USD balance is insufficient";
        var min_tnx_error = "The minimum transaction amount is ";
        var max_balance_error = "The maximum transaction amount is ";
        buy_btn.prop('disabled', true);
        $('.currancyNme').hide();
        function reset_sidebar_calculation() {
            $('#amount').val("");
            $('#total_coin').val("");
            $('#total_coin').val("");
            $('#total_fees').html(0);
            $('.overall_coin').html(0);
            $('#sub_total').html(0);
            $('#order_total').html(0);
            $('.currancyNme').hide(); 
        }
        function change_amount() {
            let total_amount = amount.val();
            token_name = token.attr('placeholder');
            // alert(token);
           
            if (total_amount == "" || total_amount == undefined) {
                reset_sidebar_calculation();
                clearTimeout(timeout);
                $('#investment_swap').show();
                $('#investment_spiner').hide();
                $('#usd_balance').hide();
                $('#token_balance').hide();
                return false;
            };
            buy_btn.prop('disabled', true);
            $('#investment_swap').hide();
            $('#investment_spiner').show();
            order_total.html(total_amount);
            clearTimeout(timeout);
            $.post(api['investment/ticker'], { 'token': token_name, 'amount': total_amount, 'action': action }, function (response) {
                if (response) {
                    $('#total_coin').val(response.data.tokens);
                    $('.overall_coin').html(response.data.tokens);
                    sub_total.text(response.data.sub_total);
                    $('.total_fees_amount').text(response.data.total_fees);
                    $('#fees_amount_buy')
                    if (response.data.amount) {
                        order_total.html(response.data.amount);
                    }
                    if (action == 'buy') {
                        $('.amount_received_model').text(parseFloat(response.data.tokens)-parseFloat(response.data.total_fees));
                    }
                }
                $('#investment_swap').show();
                $('#investment_spiner').hide();
                if (parseFloat(total_amount) > parseFloat(wallet.balance.usd) && action == 'buy') {
                    $('#usd_balance').show();
                    $('#usd_balance').html(wallet_insuficient_error);
                    $('#token_balance').hide();
                    return false;
                }
                if (parseFloat(total_amount) < parseFloat(order_detail[token_name.toLowerCase()]['min_buy_amount']) && action == 'buy') {
                    $('#usd_balance').show();
                    $('#usd_balance').html(min_tnx_error+'$'+order_detail[token_name.toLowerCase()]['min_buy_amount']);
                    $('#token_balance').hide();
                    return false;
                }
                if (parseFloat(response.data.tokens) > parseFloat(wallet.balance[token_name.toLowerCase()]) && action == 'sell') {
                    $('#usd_balance').hide();
                    $('#token_balance').html(token_name.toUpperCase() + balance_error)
                    $('#token_balance').show();
                    return false;
                }
                if (parseFloat(response.data.tokens) > parseFloat(order_detail[token_name.toLowerCase()]['base_max_size']) && action == 'sell') {
                    $('#usd_balance').hide();
                    $('#token_balance').html(max_balance_error+order_detail[token_name.toLowerCase()]['base_max_size']+token_name.toUpperCase())
                    $('#token_balance').show();
                    return false;
                }                    
                $('#usd_balance').hide();
                $('#token_balance').hide();
                buy_btn.prop('disabled', false);
            }, 'json')
                .fail(function (err) {
                    // console.log(err);
                    $('#investment_swap').show();
                    $('#investment_spiner').hide();
                    modal('#modal-message', { title: __['Error'], message: __['There is something that went wrong!'] });
                });
        }
        
        // function change_coin() {
        //     $('#total_coin').val().replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
        //     let total_amount = amount.val();
        //     token_name = token.attr('placeholder');
        //     let total_tokens = token.val();
            
        //     if (total_tokens == "" || total_tokens == undefined) {
        //         reset_sidebar_calculation();
        //         clearTimeout(timeout);
        //         $('#usd_balance').hide();
        //         $('#token_balance').hide();
        //         return
        //     };
        //     buy_btn.prop('disabled', true);
        //     $('#investment_swap').hide();
        //     $('#investment_spiner').show();

        //     clearTimeout(timeout);
        //     $('.currancyNme').show();
        //     $.post(api['investment/ticker'], { 'token': token_name, 'total_tokens': total_tokens, 'type': 'coin', 'action': action }, function (response) {
        //         if (response) {
        //             $('#amount').val(response.data.amount);
        //             order_total.html(response.data.amount);
        //             sub_total.text(response.data.sub_total);
        //             $('.total_fees_amount').text(response.data.total_fees);

        //         }
        //         $('.overall_coin').html(total_tokens);
        //         $('#investment_swap').show();
        //         $('#investment_spiner').hide();
        //         if (parseFloat(total_tokens) > parseFloat(wallet.balance[token_name.toLowerCase()]) && action == 'sell') {
        //             $('#usd_balance').hide();
        //             $('#token_balance').html(token_name.toUpperCase() + balance_error)
        //             $('#token_balance').show();
        //             return false;
        //         }
        //         if (parseFloat(total_tokens) > parseFloat(order_detail[token_name.toLowerCase()]['base_max_size']) && action == 'sell') {
        //             $('#usd_balance').hide();
        //             $('#token_balance').html(max_balance_error+order_detail[token_name.toLowerCase()]['base_max_size']+token_name.toUpperCase())
        //             $('#token_balance').show();
        //             return false;
        //         }
        //         if (parseFloat(response.data.amount) > parseFloat(wallet.balance.usd) && action == 'buy') {
        //             $('#usd_balance').show();
        //             $('#usd_balance').html(wallet_insuficient_error);
        //             $('#token_balance').hide();
        //             return false;
        //         }
        //         if (parseFloat(response.data.amount) < parseFloat(order_detail[token_name.toLowerCase()]['min_buy_amount']) && action == 'buy') {
        //             $('#usd_balance').show();
        //             $('#usd_balance').html(min_tnx_error+'$'+order_detail[token_name.toLowerCase()]['min_buy_amount']);
        //             $('#token_balance').hide();
        //             return false;
        //         }
        //         $('#usd_balance').hide();
        //         $('#token_balance').hide();
        //         buy_btn.prop('disabled', false);
        //     }, 'json')
        //         .fail(function () {
        //             $('#investment_swap').show();
        //             $('#investment_spiner').hide();
        //             // modal('#modal-message', { title: __['Error'], message: __['There is something that went wrong!'] });
        //         });
        // }
      
        $('.buySellButton').on('click', function () {
            // $(this).siblings.addClass('active');
            $('.buySellButton').removeClass('active');
            $(this).addClass('active');
            $('.coin_element').text($(this).html());
            action = $(this).data('actiontype');
            buying_text.html($(this).html() + 'ing');
            reset_sidebar_calculation();
            $('#usd_balance').hide();
            $('#token_balance').hide();
            if (action == 'buy') {
                $('#availableBalnce2').hide();
                $('#availableBalnce1').show();
        
            } else {
                $('.wallet_amount11').html(wallet_coins[token.attr('placeholder').toLowerCase()]);
                $('#availableBalnce2').show();
                $('#availableBalnce1').hide();
            }
            updateDetail();
        });

        $(document).on('click', '.availableBalnce', function () {
            // alert(wallet_coins);
            if (action == 'buy') {
                $('#amount').val(wallet_coins['usd']);
                $('#amount').trigger("input");
            } else {
                
                $('#total_coin').val(wallet_coins[token.attr('placeholder').toLowerCase()]);
                $('#total_coin').trigger("input");
                
            }
        });

        $(document).on('click', '.coinDetailPrice_wallet', function () {
            $('.coinDetailPrice_wallet').removeClass('active');
            $(this).addClass('active');
            $('#total_coin').attr('placeholder', $(this).data('coin'));
            $('#buy_btn_txt').html($(this).data('coin'));
            $('#coin_show').html($(this).data('coin'));
            $('.coin_img').attr('src', $(this).find('img').attr('src'));
           
            $('#wallet_balance').html(wallet_coins['usd']);
            $('.wallet_amount11').html(wallet_coins[$(this).data('coin').toLowerCase()]);
            updateDetail();
        });
        $(document).on('click', '#swapButton', function () {
            if ($('#amountSectionChange').hasClass('active')) {
                $('#amountSectionChange').removeClass('active');
            } else {
                $('#amountSectionChange').addClass('active');
            }
        })

        $(document).on('input', '#amount', function () {
            clearTimeout(timeou_id);
            this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
            let total_amount = amount.val();
            token_name = token.attr('placeholder');
            
            if (total_amount == "" || total_amount == undefined) {
                reset_sidebar_calculation();
                clearTimeout(timeout);
                $('#usd_balance').hide();
                $('#token_balance').hide();
                return false;
            };
            buy_btn.prop('disabled', true);
            $('#investment_swap').hide();
            $('#investment_spiner').show();
            // order_total.html(total_amount);
            $('.currancyNme').show();
            clearTimeout(timeout);
            timeout = setTimeout(function () {
                $.post(api['investment/ticker'], { 'token': token_name, 'amount': total_amount, 'action': action }, function (response) {
                    if (response) {
                        $('#total_coin').val(response.data.tokens);
                        $('.overall_coin').html(response.data.tokens);
                        sub_total.text(response.data.sub_total);
                        $('#total_fees').text(response.data.total_fees);
                        order_total.html(total_amount);
                        if (response.data.amount) {
                            order_total.html(response.data.amount);
                        }
                        
                    }
                    $('#investment_swap').show();
                    $('#investment_spiner').hide();
                   
                    if (parseFloat(total_amount) > parseFloat(wallet.balance.usd) && action == 'buy') {
                        
                        $('#usd_balance').show();
                        $('#usd_balance').html(wallet_insuficient_error);
                        $('#token_balance').hide();
                        return false;
                    }
                    if (parseFloat(total_amount) < parseFloat(order_detail[token_name.toLowerCase()]['min_buy_amount']) && action == 'buy') {
                      
                        $('#usd_balance').show();
                        $('#usd_balance').html(min_tnx_error+'$'+order_detail[token_name.toLowerCase()]['min_buy_amount']);
                        $('#token_balance').hide();
                        return false;
                    }
                    if (parseFloat(response.data.tokens) > parseFloat(wallet.balance[token_name.toLowerCase()]) && action == 'sell') {
                        $('#usd_balance').hide();
                        $('#token_balance').html(token_name.toUpperCase() + balance_error)
                        $('#token_balance').show();
                        return false;
                    }
                    if (parseFloat(response.data.tokens) > parseFloat(order_detail[token_name.toLowerCase()]['base_max_size']) && action == 'sell') {
                        $('#usd_balance').hide();
                        $('#token_balance').html(max_balance_error+order_detail[token_name.toLowerCase()]['base_max_size']+token_name.toUpperCase())
                        $('#token_balance').show();
                        return false;
                    }
                    $('#usd_balance').hide();
                    $('#token_balance').hide();
                    buy_btn.prop('disabled', false);
                    
                }, 'json')
                    .fail(function (err) {
                        $('#investment_swap').show();
                        $('#investment_spiner').hide();
                        // modal('#modal-message', { title: __['Error'], message: __['There is something that went wrong!'] });
                    });
            },2000);
        });


        $(document).on('input', '#total_coin', function () {
            this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
            let total_amount = amount.val();
            token_name = token.attr('placeholder');
            let total_tokens = token.val();
            
            if (total_tokens == "" || total_tokens == undefined) {
                reset_sidebar_calculation();
                clearTimeout(timeout);
                $('#usd_balance').hide();
                $('#token_balance').hide();
                return
            };
            buy_btn.prop('disabled', true);
            $('#investment_swap').hide();
            $('#investment_spiner').show();

            clearTimeout(timeout);
            $('.currancyNme').show();
            timeout = setTimeout(function () {
                $.post(api['investment/ticker'], { 'token': token_name, 'total_tokens': total_tokens, 'type': 'coin', 'action': action }, function (response) {
                    if (response) {
                        $('#amount').val(response.data.amount);
                        order_total.html(response.data.amount);
                        sub_total.text(response.data.sub_total);
                        total_fees.text(response.data.total_fees);
                    }
                    $('.overall_coin').html(total_tokens);
                    $('#investment_swap').show();
                    $('#investment_spiner').hide();
                    if (parseFloat(total_tokens) > parseFloat(wallet.balance[token_name.toLowerCase()]) && action == 'sell') {
                        $('#usd_balance').hide();
                        $('#token_balance').html(token_name.toUpperCase() + balance_error)
                        $('#token_balance').show();
                        return false;
                    }
                    if (parseFloat(total_tokens) > parseFloat(order_detail[token_name.toLowerCase()]['base_max_size']) && action == 'sell') {
                        $('#usd_balance').hide();
                        $('#token_balance').html(max_balance_error+order_detail[token_name.toLowerCase()]['base_max_size']+token_name.toUpperCase())
                        $('#token_balance').show();
                        return false;
                    }
                    if (parseFloat(response.data.amount) > parseFloat(wallet.balance.usd) && action == 'buy') {
                        $('#usd_balance').show();
                        $('#usd_balance').html(wallet_insuficient_error);
                        $('#token_balance').hide();
                        return false;
                    }
                    if (parseFloat(response.data.amount) < parseFloat(order_detail[token_name.toLowerCase()]['min_buy_amount']) && action == 'buy') {
                        $('#usd_balance').show();
                        $('#usd_balance').html(min_tnx_error+'$'+order_detail[token_name.toLowerCase()]['min_buy_amount']);
                        $('#token_balance').hide();
                        return false;
                    }
                    $('#usd_balance').hide();
                    $('#token_balance').hide();
                    buy_btn.prop('disabled', false);
                }, 'json')
                    .fail(function () {
                        $('#investment_swap').show();
                        $('#investment_spiner').hide();
                        // modal('#modal-message', { title: __['Error'], message: __['There is something that went wrong!'] });
                    });
            }, 1000);
        });

        $(".dropdown-menu a").click(function () {
            let token_name = (token.attr('placeholder')).toLowerCase();
            $('#dropdownMenu').prop('disabled', true);
            // $('.purchase_value_tick').hide();
            if ($(this).data('value') == 'Max') {
                $('#total_coin').val(order_detail[token_name]['base_max_size']);
                $('#total_coin').trigger("input");
                $(this).prev('a').find('span').addClass('x-hidden');
                $(this).find('span').removeClass('x-hidden');
            
            } else {
                // updateDetail();
                $('#amount').val(order_detail[token_name]['min_buy_amount']);
                $('#amount').trigger("input");
                $(this).next('a').find('span').addClass('x-hidden');
                $(this).find('span').removeClass('x-hidden');
            }
            $('.drop-down-data').html('Use '+$(this).data('value'));
            setTimeout(function() {
                $('#dropdownMenu').prop('disabled', false);
            }, 6000);
           
        });

        $('#buy_btn').on('click', function () {
            let action = $('.btnSectionBuySell').find('a.active').data('actiontype');
            let token_name = (token.attr('placeholder')).toLowerCase();
            let token_value = token.val();
            let total_amount = $('#order_total').html();
            let per_coin_price = $('.per_coin_price').html();
            let fees = $('#total_fees').text();
            let _this = $(this);
            if (parseFloat(total_amount) < parseFloat(order_detail[token_name.toLowerCase()]['min_buy_amount']) && action == 'buy') {
                $('#usd_balance').show();
                $('#usd_balance').html(min_tnx_error+'$'+order_detail[token_name.toLowerCase()]['min_buy_amount']);
                $('#token_balance').hide();
                return false;
            }
            if (parseFloat(token_value) > parseFloat(order_detail[token_name.toLowerCase()]['base_max_size']) && action == 'sell') {
                $('#usd_balance').hide();
                $('#token_balance').html(max_balance_error+order_detail[token_name.toLowerCase()]['base_max_size']+token_name.toUpperCase())
                $('#token_balance').show();
                return false;
            }
            button_status(_this, "loading");
            $.post(api['investment/order'], { 'do': action, 'token_name': token_name, 'token_value': token_value, 'amount': total_amount, 'per_coin_price': per_coin_price,'fees':fees }, function (response) {
                if (response.failed) {
                    $('#topUpModal').html(response.failed);
                    $('#topUpModal').modal('show');
                } else {
                    $('#confrimModal').html(response.initiate);
                    $('#confrimModal').modal('show');
                }
                button_status(_this, "reset");

                // eval(response.callback);
                // $('#confrimModalBody').html(response);
            }, 'json')
                .fail(function (msg) {
                    console.log(msg);
                    button_status(_this, "reset");
                    modal('#modal-message', { title: __['Error'], message: __['There is something that went wrong!'] });
                });

        });

        $(document).on('click', '#complete_order', function () {

            // alert('eny');
            let current = $(this);
            let action = $('.btnSectionBuySell').find('a.active').data('actiontype');
            let token_name = (token.attr('placeholder')).toLowerCase();
            let token_value = $('#total_coin').val();
            let total_amount = $('#amount').val();
            let confirm_cancel = $('#confirm_cancel');
            confirm_cancel.prop('disabled', true);
            let per_coin_price = $('.per_coin_price').html();
            button_status(current, "loading");
            $.post(api['investment/order'], { 'do': 'complete', 'action': action, 'token_name': token_name, 'per_coin_price': per_coin_price, 'token_value': token_value, 'amount': total_amount }, function (response) {
                if (response.failed) {
                    $('#confrimModal').modal('hide');
                    $('#topUpModal').html(response.failed);
                    $('#topUpModal').modal('show');
                    button_status(current, "reset");
                } else if (response.status == 'success') {
                    window.location.href = response.url;
                } else {
                    $('#confrimModal').html(response.initiate);
                    $('#confrimModal').modal('show');
                    button_status(current, "reset");
                }

                confirm_cancel.prop('disabled', false);
                // eval(response.callback);
                // $('#confrimModalBody').html(response);
            }, 'json')
                .fail(function () {
                    confirm_cancel.prop('disabled', false);
                    button_status(current, "reset");
                    modal('#modal-message', { title: __['Error'], message: __['There is something that went wrong!'] });
                });
        });


    });
} else {

    $(document).ready(function () {
        var api = [];
        // initialize API URLs
        api['investment/thread'] = ajax_path + "investment/thread.php";
        $('.aGraph').each(function (index) {
            createLine($(this), $(this).attr('id'));
        });
       
        function dashboardData() {
            $.post(api['investment/thread'], { 'order_action_type': "update_dashboard"}
                , 'json')
                .done(function (response) {
                    if (response['graph'] != null && response['graph'] != undefined && response['graph'] != "") {
                        garph_data = response.graph;
                    }
                    if (response['series'] != null && response['series'] != undefined && response['series'] != "") {
                        series = response.series;
                    }
                    if (response['labels'] != null && response['labels'] != undefined && response['labels'] != "") {
                        labels = response.labels;
                    }
                    $('.aGraph').each(function (index) {
                        let class_element = $(this).attr('id');
                        if (response['token_data'] != null && response['token_data'] != undefined && response['token_data'] != "") {
                            var color = "";
                            if (parseFloat(response['token_data'][index]['fluctuation']) > 0) {
                                $(this).closest('.GraphSection').find('img').attr('src', site_path + "/content/themes/default/images/investment/arrowUp.svg");
                                $(this).closest('.GraphSection').find('img').removeClass('arrowDown');
                                // $(this).attr('data-color', '#4682b4');
                                color = "#52CC8A";
                                $('.' + class_element).closest('.GraphSection').find('.imageHikWrap').find('img').removeClass('arrowDown');
                                $('.'+class_element).closest('.GraphSection').find('.imageHikWrap').find('img').attr('src',site_path+"/content/themes/default/images/investment/arrowUp.svg");
                            } else {
                                $(this).closest('.GraphSection').find('img').attr('src', site_path + "/content/themes/default/images/investment/arrowDown.svg");
                                $(this).closest('.GraphSection').find('img').addClass('arrowDown');
                                $('.'+class_element).closest('.coinDetailSection').find('.imageHikWrap').find('img').attr('src',site_path+"/content/themes/default/images/investment/arrowDown.svg");
                                $('.' + class_element).closest('.GraphSection').find('.imageHikWrap').find('img').addClass('arrowDown');
                                // $(this).attr('data-color', '#ff7979');
                                color = "#ff7979";
                            }
                            $(this).closest('.GraphSection').find('.coin_price').html(response['token_data'][index]['buy_price']);
                            $(this).closest('.GraphSection').find('p').html((parseFloat(response['token_data'][index]['fluctuation'])*100).toFixed(2)+'%');
                            $('.' + class_element).closest('.GraphSection').find('.coin_price').html(response['token_data'][index]['buy_price']);
                            $('.'+class_element).closest('.GraphSection').find('.imageHikWrap').find('p').html((parseFloat(response['token_data'][index]['fluctuation'])*100).toFixed(2)+'%');
                            garph_data = response.graph;
                            $('#total_amount').html(response['total_balance']['amount']);
                            $(this).find('svg').remove();
                            createLine($(this), $(this).attr('id'),color);
                        }
                        
                    });
                    setTimeout(dashboardData, 5000);
                })
                .fail(function (response) {
                    setTimeout(dashboardData, 5000);
                } );
        }
        setTimeout(dashboardData, 5000);
        $('.coinBaseButton').click(function (e) {
            e.preventDefault();
            let current = $(this);
            let order_action_type = current.html();
            let coin = $(this).closest('.coinDetailSection').find('.token_name').data('coin');
            $.post(api['investment/thread'], { 'order_action_type': order_action_type, 'coin': coin }, function (response) {
                window.location.href = current.attr('href');
            }, 'json')
                .fail(function () {
                    modal('#modal-message', { title: __['Error'], message: __['There is something that went wrong!'] });
                });
        })

        function createLine(el, id,color=false) {

            var element = el.data('element') + '_kline_data';

            // return 1;\
            var data = garph_data[element];
            console.log('data', data);
            // define dimensions of graph
            var m = [80, 80, 80, 80]; // margins
            var w = 500 - m[1] - m[3]; // width
            var h = 400 - m[0] - m[2]; // height
            // var data = [3, 6, 2, 7, 5, 2, 0, 3, 8, 9, 2, 5, 9, 3, 6, 3, 6, 2, 7, 5, 2, 1, 3, 8, 9, 2, 5, 9, 2, 7];
            // 3
            let min = Math.min(...data);
            let max = Math.max(...data);
            // alert(min);
            // alert(max);
            var x = d3.scale.linear().domain([0, data.length]).range([0, w]);
            var y = d3.scale.linear().domain([min, max]).range([h, 0]);
            var line = d3.svg.line()
                .interpolate("basis")
                // assign the X function to plot our line as we wish
                .x(function (d, i) {
                    // return the X coordinate where we want to plot this datapoint
                    return x(i);
                })
                .y(function (d) {
                    // console.log(d);
                    return y(d);
                })


            // Add an SVG element with the desired dimensions and margin.
            var graph = d3.select('#' + id)
                // .attr("width", w + m[1] + m[3])
                // .attr("height", h + m[0] + m[2])
                .append("svg")
                .attr("viewBox", `0 0 320 250`)
                .attr("stroke-width", 9)
                // .attr("stroke", "red")
                // .attr("stroke", $('#' + id).data('color'))
                .attr("transform", "translate(" + 2 + "," + 2 + ")");

            graph.append("svg:path").attr("d", line(data));
          
            $('#' + id).find('path').attr('stroke',color?color:$('#' + id).data('color'));
            $('.' + id).html($('#' + id).html());

        }


        var options = {
            colors: ['#f7931a', '#627eea', '#16161f'],
            series: series,
            chart: {
                height: 270,
                type: 'radialBar',
                background: 'white'
            },

            plotOptions: {

                radialBar: {
                    hollow: {
                        margin: 0,
                    },
                    fill: {
                        colors: ['#F44336', '#E91E63', '#9C27B0']
                    },
                    dataLabels: {
                        name: {
                            fontSize: '22px',
                        },
                        value: {
                            fontSize: '16px',
                        },
                        // total: {
                        //     show: false,
                        //     label: 'Total',
                        //     formatter: function (w) {
                        //         // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                        //         return 249
                        //     }
                        // }
                    }
                }
            },
            labels: labels,
        };

        var chart = new ApexCharts(document.querySelector("#apex_chart"), options);
        chart.render();
    })


}

