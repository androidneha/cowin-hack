{extends file="layouts/master.tpl"}

{block name="body"}
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="/search-by-pin" method="post">
                <div class="form-group">
                    <label for="email">PINCODE:</label>
                    <input class="form-control" name="pincode" placeholder="XXXXXX" value="{if $pincode}{$pincode}{/if}">
                </div>
                <p class="text-center">
                    <button type="submit" class="btn-lg btn btn-primary">Search</button>
                </p>
            </form>
        </div>
        <div class="col-md-12" style="margin-top: 30px">
            {foreach $response as $r}
                {if count($r)}
                    <table class="table table-hover">
                        <tr>
                            <td style="width: 30%;"></td>
                            {foreach $r[0]['sessions'] as $s}
                                <td class="text-center" style="background: #d4d2d2; width:20%; border: 1px solid #8c8a8a">{$s['date']}</td>
                            {/foreach}
                        </tr>
                            {foreach $r as $re}
                                <tr>
                                    <td style="width: 30%;">
                                        <small class="text-black"><b>{$re['name']}</b></small>
                                        <p class="text-muted"><b>ADDRESS</b>: {$re['address']}</p>
                                        <p class="text-muted"><b>State</b>: {$re['state_name']}</p>
                                        <p class="text-muted"><b>District</b>: {$re['district_name']}</p>
                                        <p class="text-muted"><b>Block Name</b>: {$re['block_name']}</p>
                                        <p class="text-muted"><b>Pincode</b>: {$re['pincode']}</p>
                                        <p class="text-muted"><b>Fee</b>: <span class="label label-danger">{$re['fee_type']}</span> </p>
                                    </td>
                                    {foreach $re['sessions'] as $key => $s}
                                        {if $key <= 2}
                                            <td style="padding-top: 40px;" width="250">
                                                <p class="text-center">
                                                    {if $s['available_capacity'] == 0}
                                                        <span class="label label-danger">Booked</span>
                                                        {else}
                                                        <span class="label label-success" style="background-color: green">Available ({$s['available_capacity_dose1']} + {$s['available_capacity_dose2']})</span>
                                                    {/if}
                                                    <br>
                                                    <span class="text-uppercase">{$s['vaccine']}</span>
                                                    <br>
                                                    Dose1: {$s['available_capacity_dose1']} | Dose2: {$s['available_capacity_dose2']}<br>
                                                    <span class="text-danger">Age {$s['min_age_limit']}+</span>
                                                </p>
                                            </td>
                                        {/if}
                                    {/foreach}
                                </tr>
                            {/foreach}
                    </table>
                    {else}
                    <h3 class="text-center">No slot Available.</h3>
                {/if}
                {foreachelse}
            {/foreach}
        </div>
    </div>
{/block}
