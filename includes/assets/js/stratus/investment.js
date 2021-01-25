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
        updateToken();
        setInterval(updateToken, 30000);
        function updateToken() {
            $.post(api['investment/thread'], { 'order_action_type': 'get_all_tokens_rate' }, function (response) {
                if (response) {
                    buy_details = response.buy_details;
                    sell_details = response.sell_details;
                    updateDetail();
                }
            }, 'json')
                .fail(function (err) {

                })


        }

        var action = $('.btnSectionBuySell').find('a.active').data('actiontype');
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
            }
            change_amount();

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
        buy_btn.prop('disabled', true);
        function change_amount() {
            let total_amount = amount.val();
            token_name = token.attr('placeholder');
            // alert(token);
            if (parseFloat(total_amount) > parseFloat(wallet.balance.usd) && action == 'buy') {
                $('#usd_balance').show();
                $('#token_balance').hide();
                return false;
            }
            if (total_amount == "" || total_amount == undefined) {
                amount.val("");
                token.val("");
                clearTimeout(timeout);
                $('#investment_swap').show();
                $('#investment_spiner').hide();
                $('#usd_balance').hide();
                $('#token_balance').hide();
                return false;
            };
            $('#usd_balance').hide();
            $('#token_balance').hide();
            buy_btn.prop('disabled', true);
            $('#investment_swap').hide();
            $('#investment_spiner').show();
            order_total.html(total_amount);
            clearTimeout(timeout);
            timeout = setTimeout(function () {
                $.post(api['investment/ticker'], { 'token': token_name, 'amount': total_amount, 'action': action }, function (response) {
                    if (response) {
                        $('#total_coin').val(response.data.tokens);
                        $('.overall_coin').html(response.data.tokens);
                        sub_total.text(response.data.sub_total);
                        $('#total_fees').text(response.data.total_fees);
                        if (response.data.amount) {
                            order_total.html(response.data.amount);
                        }
                    }
                    $('#investment_swap').show();
                    $('#investment_spiner').hide();
                    if (parseFloat(response.data.tokens) > parseFloat(wallet.balance[token_name.toLowerCase()]) && action == 'sell') {
                        $('#usd_balance').hide();
                        $('#token_balance').html(token_name.toUpperCase() + balance_error)
                        $('#token_balance').show();
                        return false;
                    }
                    buy_btn.prop('disabled', false);
                    if (total_amount < min_tnx_amnt) {
                        buy_btn.prop('disabled', true);
                    }
                    if (total_amount > max_tnx_amnt) {
                        buy_btn.prop('disabled', true);
                    }
                }, 'json')
                    .fail(function (err) {
                        // console.log(err);
                        $('#investment_swap').show();
                        $('#investment_spiner').hide();
                        modal('#modal-message', { title: __['Error'], message: __['There is something that went wrong!'] });
                    });
            }, 2000);
        }
        $('.buySellButton').on('click', function () {
            // $(this).siblings.addClass('active');
            $('.buySellButton').removeClass('active');
            $(this).addClass('active');
            $('.coin_element').text($(this).html());
            action = $(this).data('actiontype');
            buying_text.html($(this).html() + 'ing');
            updateDetail();
        });

        $(document).on('click', '.coinDetailPrice_wallet', function () {
            $('.coinDetailPrice_wallet').removeClass('active');
            $(this).addClass('active');
            $('#total_coin').attr('placeholder', $(this).data('coin'));
            $('#buy_btn_txt').html($(this).data('coin'));
            $('.coin_img').attr('src', $(this).find('img').attr('src'));
            updateDetail();
        });




        $(document).on('click', '#swapButton', function () {
            if ($('#amountSectionChange').hasClass('active')) {
                $('#amountSectionChange').removeClass('active');
            } else {
                $('#amountSectionChange').addClass('active');
            }
        })

        $(document).on('keyup', '#amount', function () {
            this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
            let total_amount = amount.val();
            token_name = token.attr('placeholder');
            console.log('balance.usd', wallet.balance);

            if (parseFloat(total_amount) > parseFloat(wallet.balance.usd) && action == 'buy') {
                $('#usd_balance').show();
                $('#token_balance').hide();
                return false;
            }
            if (total_amount == "" || total_amount == undefined) {
                amount.val("");
                token.val("");
                clearTimeout(timeout);
                $('#investment_swap').show();
                $('#investment_spiner').hide();
                $('#usd_balance').hide();
                $('#token_balance').hide();
                return false;
            };
            $('#usd_balance').hide();
            $('#token_balance').hide();
            buy_btn.prop('disabled', true);
            $('#investment_swap').hide();
            $('#investment_spiner').show();
            order_total.html(total_amount);
            clearTimeout(timeout);
            timeout = setTimeout(function () {
                $.post(api['investment/ticker'], { 'token': token_name, 'amount': total_amount, 'action': action }, function (response) {
                    if (response) {
                        $('#total_coin').val(response.data.tokens);
                        $('.overall_coin').html(response.data.tokens);
                        sub_total.text(response.data.sub_total);
                        $('#total_fees').text(response.data.total_fees);
                        if (response.data.amount) {
                            order_total.html(response.data.amount);
                        }
                    }
                    $('#investment_swap').show();
                    $('#investment_spiner').hide();
                    if (parseFloat(response.data.tokens) > parseFloat(wallet.balance[token_name.toLowerCase()]) && action == 'sell') {
                        $('#usd_balance').hide();
                        $('#token_balance').html(token_name.toUpperCase() + balance_error)
                        $('#token_balance').show();
                        return false;
                    }
                    buy_btn.prop('disabled', false);
                    if (total_amount < min_tnx_amnt) {
                        buy_btn.prop('disabled', true);
                    }
                    if (total_amount > max_tnx_amnt) {
                        buy_btn.prop('disabled', true);
                    }
                }, 'json')
                    .fail(function (err) {
                        $('#investment_swap').show();
                        $('#investment_spiner').hide();
                        modal('#modal-message', { title: __['Error'], message: __['There is something that went wrong!'] });
                    });
            }, 1000);
        });


        $(document).on('input', '#total_coin', function () {
            this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
            let total_amount = amount.val();
            token_name = token.attr('placeholder');
            let total_tokens = token.val();
            debounce(updateToken, 20000);
            if (parseFloat(total_tokens) > parseFloat(wallet.balance[token_name.toLowerCase()]) && action == 'sell') {
                $('#usd_balance').hide();
                $('#token_balance').html(token_name.toUpperCase() + balance_error)
                $('#token_balance').show();
                return false;
            }
            // alert(token);
            if (total_tokens == "" || total_tokens == undefined) {
                amount.val("");
                token.val("");
                clearTimeout(timeout);
                $('#usd_balance').hide();
                $('#token_balance').hide();
                return
            };

            $('#usd_balance').hide();
            $('#token_balance').hide();
            buy_btn.prop('disabled', true);
            $('#investment_swap').hide();
            $('#investment_spiner').show();

            clearTimeout(timeout);
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
                    if (parseFloat(response.data.amount) > parseFloat(wallet.balance.usd) && action == 'buy') {
                        $('#usd_balance').show();
                        $('#token_balance').hide();
                        return false;
                    }
                    buy_btn.prop('disabled', false);
                    if (response.data.amount < min_tnx_amnt) {
                        buy_btn.prop('disabled', true);
                    }
                    if (response.data.amount > max_tnx_amnt) {
                        buy_btn.prop('disabled', true);
                    }
                }, 'json')
                    .fail(function () {
                        $('#investment_swap').show();
                        $('#investment_spiner').hide();
                        modal('#modal-message', { title: __['Error'], message: __['There is something that went wrong!'] });
                    });
            }, 1000);
        });

        $('#buy_btn').on('click', function () {
            let action = $('.btnSectionBuySell').find('a.active').data('actiontype');
            let token_name = (token.attr('placeholder')).toLowerCase();
            let token_value = token.val();
            let total_amount = $('#order_total').html();
            let per_coin_price = $('.per_coin_price').html();
            let _this = $(this);
            button_status(_this, "loading");
            $.post(api['investment/order'], { 'do': action, 'token_name': token_name, 'token_value': token_value, 'amount': total_amount, 'per_coin_price': per_coin_price }, function (response) {
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
                .fail(function () {
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

        function createLine(el, id) {

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
            var graph = d3.select('#' + id).append("svg:svg")
                .attr("width", w + m[1] + m[3])
                .attr("height", h + m[0] + m[2])
                .append("svg:g")
                .attr("stroke-width", 9)
                .attr("stroke", "red")
                // .attr("stroke", $('#' + id).data('color'))
                .attr("transform", "translate(" + 2 + "," + 2 + ")");

            graph.append("svg:path").attr("d", line(data));
            $('#' + id).find('path').attr('stroke', $('#' + id).data('color'));
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

