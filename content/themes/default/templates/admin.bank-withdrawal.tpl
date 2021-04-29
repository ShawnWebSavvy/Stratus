<div class="card">
    <div class="card-header with-icon d-flex align-items-center">
        <div class="svg-container mr10">
            <img style="width: 20px;" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/tick.svg" class="">
        </div>
        {__("Bank Withdrawal")}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover js_dataTable">
                <thead>
                    <tr>
                        <th>{__("ID")}</th>
                        <th>{__("User Name")}</th>
                        <th>{__("Amount Requested")}</th>
                        <th>{__("Available Balance")}</th>
                        <th>{__("Status")}</th>
                        <th>{__("Actions")}</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$user_requested key=k item=row}
                        <tr>
                            <td>{$k+1}</td>
                            <td>
                                {$row['user_firstname']} {$row['user_lastname']}
                            </td>
                            <td>
                                {$row['amount']}
                            </td>
                            <td>
                                {$row['user_wallet_balance']|number_format:2}
                            </td>
                            <td>
                                {if $row['status'] === "0"}
                                    <div class="alert alert-warning" role="alert">
                                        <strong>Pending</strong>
                                    </div>
                                {elseif $row['status'] === "1"}
                                    <div class="alert alert-success" role="alert">
                                        <strong>Approved</strong>
                                    </div>
                                {elseif $row['status'] === "2"}
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Declined</strong>
                                    </div>
                                {/if}
                            </td>
                            <td>
                                <button data-toggle="tooltip" data-placement="top" title='{__("Approve")}' class="btn btn-sm btn-icon btn-rounded js_admin-pay_approve" data-user_id="{$row['user_id']}" data-url="#bank-withdrawl" data-id="{$row['id']}">
                                    <i class="fa fa-check"></i>
                                </button>
                                <button data-toggle="tooltip" data-placement="top" title='{__("Decline")}' class="btn btn-sm btn-icon btn-rounded js_admin-pay_disapproves" data-user_id="{$row['user_id']}" data-id="{$row['id']}">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</div>