//revenue
    let total_revenue = 215639;
    let cost_of_goods_sold=131376;
    let gross_profit = diff(total_revenue,cost_of_goods_sold);
    
//operating expenses
    let RD = 10045; //researh and development
    let SGA = 14194;   //sales, general and admin
    let operating_income = diff(gross_profit,RD,SGA);

//net income
    //non operating items
        let additional_income = 1348;
        let income_tax = 15685;
    let net_income = diff(sum(operating_income,additional_income),income_tax)

//output
console.log("Gross Profit : "+gross_profit);
console.log("operating income: "+operating_income);
console.log("net income: "+net_income);

//function
function diff()
{
    let result = 0;
    if(arguments.length>0)
    {
        result = arguments[0];
    }
    else{
        return 0;
    }
    for(let i=0;i<arguments.length-1;i++)
    {
    result -= arguments[i+1];
    }
    return result;
}
function sum()
{
    let sum=0;
    for(let i=0;i<arguments.length;i++)
    {
        sum +=arguments[i];
    }
    return sum;
}