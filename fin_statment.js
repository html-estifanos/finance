let liablity = 1500;
let equity = 2000;

    //assets
        //--------------list of current assets
        let cash =167971;
        let account_receivable = 5100;
        let prepaid_expenses=4806;
        let inventory = 7805;
        let total_current_asset = current_ass(cash,account_receivable,prepaid_expenses,inventory);
        

        //--------------list of non current assets
        let PPE = 45500;
        let goodwill=3580;
        let total_non_current_asset = non_casset(PPE,goodwill);
        
    let total_asse = sum(total_non_current_asset,total_current_asset);
    //end of asets

    //liablities
        //-----current liablities
        let acc_pay = 3902;
        let accrd_exp=1320;
        let un_revenue=1540;
        let total_c_liabl = c_liable(acc_pay,accrd_exp,un_revenue);
    
        //-----non current liablities
        let long_term_debt = 50000;
        let other_l_t_liablities = 5526;
        let total_n_liable = n_liable(long_term_debt,other_l_t_liablities);
        let total_liablities = sum(total_n_liable,total_c_liabl);
    //end of liablities

    //share holders equity
        let  equity_capital = 170000;
        let retained_earnings = 2474;
        let share_eqiuty = s_equit(equity_capital,retained_earnings);
    //end of equity

    //checker
        

console.log("total current asset: "+tot_current_asset);
console.log("total non current asset: "+total_n_current_asset);
console.log("total asset: "+total_asse);
console.log("total current  liables: "+total_c_liabl);
console.log("total non current liablities: "+total_n_liable);
console.log("total liablities: "+total_liablities);
console.log("total shareholder\'s equiy: "+share_eqiuty);




//asset functions
    function current_ass(a,b,c,d)
    {
        return a+b+c+d;
    }

    function non_casset(a,b)
    {
        return a+b;
    }

    function total_asset(x,y)
    {
        return x+y;
    }

//liable functions
    function c_liable(a,b,c)
    {
        return a+b+c;
    }
    function n_liable(a,b)
    {
        return a+b;
    }
//equity functions
    function  s_equit(a,b)
    {
        return a+b;
    }