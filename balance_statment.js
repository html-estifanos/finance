    //assets
        //--------------list of current assets
        let cash =167971;
        let account_receivable = 5100;
        let prepaid_expenses=4806;
        let inventory = 7805;
        let short_term_investment=0;
        let total_current_asset = sum(cash,account_receivable,prepaid_expenses,inventory,short_term_investment);


        //--------------list of non current assets
        let PPE = 45500;
        let goodwill=3580;
        let total_non_current_asset = sum(PPE,goodwill);

    let total_asset = sum(total_non_current_asset,total_current_asset);
    //end of asets

    //liablities
        //-----current liablities
        let account_payable = 3902;
        let accrued_expenses=1320;
        let unearned_revenue=1540;
        let  short_term_loans = 0;
        let income_tax_payable=0;
        let lease_obligation = 0;
        let current_portion_of_log_term_debt=0;
        let total_current_liable = sum(account_payable,accrued_expenses,unearned_revenue,short_term_loans,income_tax_payable,lease_obligation,current_portion_of_log_term_debt);

        //-----non current liablities
        let long_term_debt = 50000;
        let other_long_term_liablities = 5526;
        let deferred_income_tax = 0;
        let long_term_lease_obligation=0;
        let total_non_current_liable = sum(long_term_debt,other_long_term_liablities,deferred_income_tax,long_term_lease_obligation);
     let total_liablities = sum(total_non_current_liable,total_current_liable);
    //end of liablities

    //share holders equity
        let  equity_capital = 170000;
        let retained_earnings = 2474;
        let commom_stock=0;
        let other_comprehensive_income_loss=0;
    let share_eqiuty = sum(equity_capital,retained_earnings,commom_stock,other_comprehensive_income_loss);
    //end of equity

//output
console.log("total current asset: "+total_current_asset);
console.log("total non current asset: "+total_non_current_asset);
console.log("total asset: "+total_asset);
console.log("----------------------------------------");
console.log("total current  liables: "+total_current_liable);
console.log("total non current liablities: "+total_non_current_liable);
console.log("total liablities: "+total_liablities);
console.log("----------------------------------------");
console.log("total shareholder\'s equiy: "+share_eqiuty);
console.log("============================================")
console.log("are the statments agree : " + check(total_asset,(share_eqiuty+total_liablities)));

//functions
function sum()
{
    let sum=0;
    for(let i=0;i<arguments.length;i++)
    {
        sum +=arguments[i];
    }
    return sum;
}
function check(x,y)
{
    if(x==y)
    {
        return "yes";
    }
    else{
        return "no";
    }

}