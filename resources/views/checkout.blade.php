<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <p>{{Auth::User()->id}}</p>
    <p>{{Auth::User()->name}}</p>
    <p>{{Auth::User()->email}}</p>
    <form action="/logout" method="post">
        @csrf
    <button type="submit">Logout</button></form>
    <div
        class="table-responsive container printarea"
    >
    <button class="btn btn-success" onclick="printdiv()">Print Bill</button>

        <table
            class="table table-striped"
        >
            <thead>
                <tr>


                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Product Total Price</th>
                    <th scope="col">Delete Product</th>
                </tr>
            </thead>
            <tbody>
               @foreach($atc as $a)
               <tr class="">
                <td scope="row">{{$a->Product_Name}}</td>
                <td scope="row">{{$a->Product_Price}}</td>
                <td scope="row">{{$a->Product_Quantity}}</td>
                <td scope="row">{{$a->Product_Total}}</td>

                <td>
                    <form action="/deleteproduct/{{$a->id}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Remove Product</button>
                    </form>
                </td>

               </tr>
               @endforeach

            </tbody>
        </table>
    </div>


        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.js" integrity="sha512-BaXrDZSVGt+DvByw0xuYdsGJgzhIXNgES0E9B+Pgfe13XlZQvmiCkQ9GXpjVeLWEGLxqHzhPjNSBs4osiuNZyg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

       <script>
            function printdiv()
            {
                $('.printarea').print()
            }
        </script>
    </body>
</html>
