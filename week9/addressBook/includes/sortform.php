<form action="#" method="GET">
    <fieldset>
        <legend>Sort</legend>
       

        <label>Choose a column to sort by: </label>  
       
        <input type="radio" name="orderby" value="fullname">Name</input>
        <input type="radio" name="orderby" value="address">Address</input>
        <input type="radio" name="orderby" value="email">Email</input>
        <input type="radio" name="orderby" value="phone">Phone</input>
        <input type="hidden" name="action" value="sort" />
        <input type="submit" value="Submit" />
    </fieldset>    
</form>
