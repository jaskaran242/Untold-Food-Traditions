<style>

    #p-filter {
        font-size: 17px;
        font-family: 'Lora', serif;
        margin: 5px 15px;
    }

    .btn-group {
        margin-left: 75px;
    }

    .btn-check {
        display: none;
    }

    #radio_label {
        padding: 8px 14px;
        font-size: 14px;
        font-family: sans-serif;
        color: black;
        cursor: pointer;
        transition: background 0.1s;
        border: 0.5px solid black;
    }

    #radio_label:not(:last-of-type) {
        border-right: 1px solid black;
    }

    #radio_label:hover {
        background: #ccc;
    }

    .btn-check:checked + #radio_label {
        background: black;
        color: white;
    }

</style>

<div>
    <p id="p-filter">Select the type of dish:</p><br>
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        
        <input type="radio" class="btn-check" name="dish-type" id="food-radio" value="food">
        <label for="food-radio" class="btn btn-outline-primary" id="radio_label" style="border-top-left-radius: 12px; border-bottom-left-radius: 12px;">Food</label>

        <input type="radio" class="btn-check" name="dish-type" id="drinks-radio" value="drinks">
        <label for="drinks-radio" class="btn btn-outline-primary" id="radio_label">Drinks</label>

        <input type="radio" class="btn-check" name="dish-type" id="desserts-radio" value="desserts">
        <label for="desserts-radio" class="btn btn-outline-primary" id="radio_label">Desserts</label>

        <input type="radio" class="btn-check" name="dish-type" id="snacks-radio" value="snacks">
        <label for="snacks-radio" class="btn btn-outline-primary" id="radio_label" style="border-top-right-radius: 12px; border-bottom-right-radius: 12px;">Snacks</label>
    
    </div>

    <br>
    <br>

    <p id="p-filter">Select the cuisine:</p><br>
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        
        <input type="radio" class="btn-check" name="cuisine" id="indian-radio" value="indian">
        <label for="indian-radio" class="btn btn-outline-primary" id="radio_label" style="border-top-left-radius: 12px; border-bottom-left-radius: 12px;">Indian</label>

        <input type="radio" class="btn-check" name="cuisine" id="mexican-radio" value="mexican">
        <label for="mexican-radio" class="btn btn-outline-primary" id="radio_label">Mexican</label>

        <input type="radio" class="btn-check" name="cuisine" id="italian-radio" value="italian">
        <label for="italian-radio" class="btn btn-outline-primary" id="radio_label">Italian</label>

        <input type="radio" class="btn-check" name="cuisine" id="burmese-radio" value="burmese">
        <label for="burmese-radio" class="btn btn-outline-primary" id="radio_label">Burmese</label>

        <input type="radio" class="btn-check" name="cuisine" id="south-indian-radio" value="south-indian">
        <label for="south-indian-radio" class="btn btn-outline-primary" id="radio_label">South Indian</label>

        <input type="radio" class="btn-check" name="cuisine" id="north-indian-radio" value="north-indian">
        <label for="north-indian-radio" class="btn btn-outline-primary" id="radio_label">North Indian</label>

        <input type="radio" class="btn-check" name="cuisine" id="american-radio" value="american">
        <label for="american-radio" class="btn btn-outline-primary" id="radio_label">American</label>

        <input type="radio" class="btn-check" name="cuisine" id="continental-radio" value="continental">
        <label for="continental-radio" class="btn btn-outline-primary" id="radio_label">Continental</label>

        <input type="radio" class="btn-check" name="cuisine" id="vietnamese-radio" value="vietnamese">
        <label for="vietnamese-radio" class="btn btn-outline-primary" id="radio_label" style="border-top-right-radius: 12px; border-bottom-right-radius: 12px;">Vietnamese</label>
    
    </div>
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        
        <input type="radio" class="btn-check" name="cuisine" id="chinese-radio" value="chinese">
        <label for="chinese-radio" class="btn btn-outline-primary" id="radio_label" style="border-top-left-radius: 12px; border-bottom-left-radius: 12px;">Chinese</label>

        <input type="radio" class="btn-check" name="cuisine" id="maharashtrian-radio" value="maharashtrian">
        <label for="maharashtrian-radio" class="btn btn-outline-primary" id="radio_label">Maharashtrian</label>

        <input type="radio" class="btn-check" name="cuisine" id="gujarati-radio" value="gujarati">
        <label for="gujarati-radio" class="btn btn-outline-primary" id="radio_label">Gujarati</label>

        <input type="radio" class="btn-check" name="cuisine" id="fusion-radio" value="fusion">
        <label for="fusion-radio" class="btn btn-outline-primary" id="radio_label">Fusion</label>

        <input type="radio" class="btn-check" name="cuisine" id="european-radio" value="european">
        <label for="european-radio" class="btn btn-outline-primary" id="radio_label">European</label>

        <input type="radio" class="btn-check" name="cuisine" id="chaats-radio" value="chaats">
        <label for="chaats-radio" class="btn btn-outline-primary" id="radio_label">Chaats</label>

        <input type="radio" class="btn-check" name="cuisine" id="salads-radio" value="salads">
        <label for="salads-radio" class="btn btn-outline-primary" id="radio_label">Salads</label>

        <input type="radio" class="btn-check" name="cuisine" id="chocolates-radio" value="chocolates">
        <label for="chocolates-radio" class="btn btn-outline-primary" id="radio_label" style="border-top-right-radius: 12px; border-bottom-right-radius: 12px;">Chocolates</label>
    
    </div>

    <br>
    <br>

    <p id="p-filter">Select the ingredients used:</p><br>
    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
        
        <input type="checkbox" class="btn-check" name="ingredients" id="potato-checkbox" value="potato">
        <label for="potato-checkbox" class="btn btn-outline-primary" id="radio_label" style="border-top-left-radius: 12px; border-bottom-left-radius: 12px;">Potato</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="onion-checkbox" value="onion">
        <label for="onion-checkbox" class="btn btn-outline-primary" id="radio_label">Onion</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="tomatoes-checkbox" value="tomatoes">
        <label for="tomatoes-checkbox" class="btn btn-outline-primary" id="radio_label">Tomatoes</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="peas-checkbox" value="peas">
        <label for="peas-checkbox" class="btn btn-outline-primary" id="radio_label">Peas</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="lemon-checkbox" value="lemon">
        <label for="lemon-checkbox" class="btn btn-outline-primary" id="radio_label">Lemon</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="corn-checkbox" value="corn">
        <label for="corn-checkbox" class="btn btn-outline-primary" id="radio_label">Corn</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="spinach-checkbox" value="spinach">
        <label for="spinach-checkbox" class="btn btn-outline-primary" id="radio_label">Spinach</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="broccoli-checkbox" value="broccoli">
        <label for="broccoli-checkbox" class="btn btn-outline-primary" id="radio_label">Broccoli</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="cauliflower-checkbox" value="cauliflower">
        <label for="cauliflower-checkbox" class="btn btn-outline-primary" id="radio_label">Cauliflower</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="olive-checkbox" value="olive">
        <label for="olive-checkbox" class="btn btn-outline-primary" id="radio_label">Olive</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="carrots-checkbox" value="carrots">
        <label for="carrots-checkbox" class="btn btn-outline-primary" id="radio_label" style="border-top-right-radius: 12px; border-bottom-right-radius: 12px;">Carrots</label>

    </div>
    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
        
        <input type="checkbox" class="btn-check" name="ingredients" id="avocado-checkbox" value="avocado">
        <label for="avocado-checkbox" class="btn btn-outline-primary" id="radio_label" style="border-top-left-radius: 12px; border-bottom-left-radius: 12px;">Avocado</label>
        
        <input type="checkbox" class="btn-check" name="ingredients" id="eggplant-checkbox" value="eggplant">
        <label for="eggplant-checkbox" class="btn btn-outline-primary" id="radio_label">Eggplant</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="pumpkin-checkbox" value="pumpkin">
        <label for="pumpkin-checkbox" class="btn btn-outline-primary" id="radio_label">Pumpkin</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="capsicum-checkbox" value="capsicum">
        <label for="capsicum-checkbox" class="btn btn-outline-primary" id="radio_label">Capsicum</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="honey-checkbox" value="honey">
        <label for="honey-checkbox" class="btn btn-outline-primary" id="radio_label">Honey</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="milk-checkbox" value="milk">
        <label for="milk-checkbox" class="btn btn-outline-primary" id="radio_label">Milk</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="butter-checkbox" value="butter">
        <label for="butter-checkbox" class="btn btn-outline-primary" id="radio_label">Butter</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="paneer-checkbox" value="paneer">
        <label for="paneer-checkbox" class="btn btn-outline-primary" id="radio_label">Paneer</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="cheese-checkbox" value="cheese">
        <label for="cheese-checkbox" class="btn btn-outline-primary" id="radio_label">Cheese</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="cream-checkbox" value="cream">
        <label for="cream-checkbox" class="btn btn-outline-primary" id="radio_label">Cream</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="curd-checkbox" value="curd">
        <label for="curd-checkbox" class="btn btn-outline-primary" id="radio_label" style="border-top-right-radius: 12px; border-bottom-right-radius: 12px;">Curd</label>

    </div>
    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
        
        <input type="checkbox" class="btn-check" name="ingredients" id="eggs-checkbox" value="eggs">
        <label for="eggs-checkbox" class="btn btn-outline-primary" id="radio_label" style="border-top-left-radius: 12px; border-bottom-left-radius: 12px;">Eggs</label>
        
        <input type="checkbox" class="btn-check" name="ingredients" id="chicken-checkbox" value="chicken">
        <label for="chicken-checkbox" class="btn btn-outline-primary" id="radio_label">Chicken</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="mutton-checkbox" value="mutton">
        <label for="mutton-checkbox" class="btn btn-outline-primary" id="radio_label">Mutton</label>
        
        <input type="checkbox" class="btn-check" name="ingredients" id="turkey-checkbox" value="turkey">
        <label for="turkey-checkbox" class="btn btn-outline-primary" id="radio_label">Turkey</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="fish-checkbox" value="fish">
        <label for="fish-checkbox" class="btn btn-outline-primary" id="radio_label">Fish</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="ham-checkbox" value="ham">
        <label for="ham-checkbox" class="btn btn-outline-primary" id="radio_label">Ham</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="crab-checkbox" value="crab">
        <label for="crab-checkbox" class="btn btn-outline-primary" id="radio_label">Crab</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="prawn-checkbox" value="prawn">
        <label for="prawn-checkbox" class="btn btn-outline-primary" id="radio_label">Prawn</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="shrimp-checkbox" value="shrimp">
        <label for="shrimp-checkbox" class="btn btn-outline-primary" id="radio_label">Shrimp</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="salmon-checkbox" value="salmon">
        <label for="salmon-checkbox" class="btn btn-outline-primary" id="radio_label">Salmon</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="squid-checkbox" value="squid">
        <label for="squid-checkbox" class="btn btn-outline-primary" id="radio_label">Squid</label>

        <input type="checkbox" class="btn-check" name="ingredients" id="clam-checkbox" value="clam">
        <label for="clam-checkbox" class="btn btn-outline-primary" id="radio_label" style="border-top-right-radius: 12px; border-bottom-right-radius: 12px;">Clam</label>

    </div>
</div>