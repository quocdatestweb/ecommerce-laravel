<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="shortcut icon"
        href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAABF1BMVEX////0QzUAAAACqfTIHh4Dd7z9RjdLS0tEEw/4RDbNzc3HNyuNJx/DNSrPOS3kPzICrvsYBwUDe8LOHx/X19cSBQT4+Pjh4eGHJR3dPTC5MyjuQTTu7u6Xl5daWlq7u7t+Ixs+Pj6rLyWGhoYvDQpxHxloHRcnJyfWOy5OFRHAwMCjo6Nra2tiYmIZGRklCghYGBOZKiGxsbGjGRkCnugCRGxRUVF4eHg6EA3dMSlhGxVRDAwwMDADitMDcLEBP1sBV30ADBECWo65HBxfDg5vERF/ExMAGimvMCYBf7cDk9wBL0sCQ2oBi8kBa5oCTn0CYpsAFyEpDAmYFxczBgcBNVUBS20BJj0BDxcAKDkBgrwBcKEBNk6KMFhPAAAQ4ElEQVR4nO1daVsayRYWhJZWVhcCtgviBnEDwyh6NXdMbiaOdzJjnOXOkv//O27TXed07VQ3EIo8vJ8Uiup6qXNOnaWqWFiYY4455phjjjnmmOMbQXVr+XJ7/3TnaskOXO2c7m9fLm9Vx8NuefvsPG0nzs+2l7dGpLd7djxtGkNwfrabfCrX96c9fENcryfi9/pq2gOPgaXX8fktTXvQMRGT46udaQ84AXZiGJ1tWQcXB/2cLei/VGRD3DadwD3ug5VOvlAsuY5NcEvFzdq/eIp7r0wIXnJTVyt6foeum7IL/ogcN/PmAzeZu8MJsivE7UrKsY0bBTe1lnnDzuT+MIKMiWmUbKYX4iaz9v4/9KB3tPyq9BpxWLefnw8vw3Fc0vg4VcrGHBSdaY/dFGs+xzcXlL1RU6QI1qwzLRoMKGY+GFCk3LTCzExggJvMYBo3cPhXcoLX2KBfmqEJDBBQfP8bMriWEYzWwY43awQDQfUltY0cLkWC6/jm7SypIGJAMbMWrY1CQFW9wxmcSYKpVIaleMdbG3RlcjMoogG8gGIGdZFzblBGKyoj4/JIDfkmSKvh8HtSdCY8UxgDjZtgEt+jo8rKKa6ERfmY3FR9hUWxXtK4rK7jlerFVknXJmznDhrKW/rxw4oORW42QlV8g6ui1I525eugW4+sVIRcrSUfv+NtHh2QNo0V9UQ6qWKtA995u1Hw2O4OJc9kcch0F8rp2g/wLmVPq5BQaysG4x0oHnEkEWrX7V7Qbfqbiq8t1eW6rfiufvT2cII+RebxNyFFUMXjyNicwAfqChl9VD9DGL5b3ODbtKXfg7TTGmikWzcgmE6zPYcM38ObJ8gQXskrfDU3r3lGk/2Q05U1WhG+B+9W3t1FyyFflBHDomwSwUU9B4K75IWKJyeoZ5h+pEcvJ+g7uuwsukq5B5840RyGk5h5D1IEET8YUoWZGcaQlm1n06CRniDMSwI9xEkEY7MUEnwFzdW2X8+wgx/UfPEHDMMjXX8gS3FtaTSJGWgQZqYgd6jSwojhxia1GjU7+CBUBjd67aDhN24eRlaHkhCXnulO3m9Y6B5R9rcRNnVa1NrXJO81qTWyLo54jdXEbUZI1SETMPQdHho4zkPyJLeAg2ymBvk51yk18CXKHcxFvEtu0NB3ETYPhKbUw1r4bSpcmhA3RBNJ6z1aSG/VzgfFkH45UjpgiFOIKRDXgS8/mkQcbbpNr/GuW8OmwljQtCqcLgQRU/BQXlGL4WNshikHLH4r/B+1kF4kHRj3AXYH9rbDPdIBfW8L4mfMkNiaX0nzwZJ4Sv7WxPUqhiinmy4z8iN2gAfc4JxD1SPdPvkyks8hJ6anvsdGCrwqh03LEMQtnH8HqLSYZm6TvFwjxB0iQn1hpmC+xZXZmCEJotbId+Uv+lvc42MxhMeGc+iR/3JsV26JONc54EEYvoiySKTgQhyCKUOiiGhNtxZek78KSeawSX8YLWmTVy9QVzIzDtjXFeGZRJMPk+uhG64XGVDE12hoWrpPqSwNWP3gdVTDFjcI/CLI6PD/A1ERg7f6ovtoPoecIp5A+mJD90E5Qxd90I3gK3fAURGGvcJOrlsi/6crK3yA6bbyjaYk4o/NMEN8jX0oxYhaL2Po0SU8DxfzfGhoyIz2BYawisAyRzltnU3PdRxq/R4UzWRDMGYIpuYlbL8DHk3HhOFGLY+oUV5j6FU7xHxJXAfSrgGeQStNodOo5buPxbqcWmKGJOu2t0DCe1G3JQwVaJCHvrA8IjjE58R10pF12G8IMpuEIRhTUo46huhX7XYPZfhC7IJHeIjrDiyUkaviyIOLg01VUic+Q7JcnAND0RM0ZgimE5Y98csC+aWcMVX8lGspkjqxGUKMODpDeCQu7HmhK7BBtCvgKpIBfFZk6gz7UezuEYYSKRXncGBhO/IupamGERieq4ZlwvCiSdkGjR4SG8QabNdpHQppuWAWJSRG0ENSkTkyYrgRofLSbhSYpdkl9oTPnfgMCRHeYPthbyF/m3upcETrozDkVou7BbI3QYzIJAwrrVIEj1+/UBaFMYBLLmroYIFPeX5vrSZleiSLc3yGJC+8BOHhhRHDki6F4BC9qgg+DSzwqOyu63lUD2GHpciH4D3bJAyJVbjGPJQqV8ox1LTCYJ7viguUB5T96e4LDnqUFREnewTP+9Lgk2YMMU2/ybXCaIl8HPxUoTekmEsePUEaA0pQl1g5lBmwmAxhEILbRpbDChAhky0xukTQX9SdD2W4xi4W6wtV8pfOmJoxTDkgZIrBHUGepq2aKQcflJwha0rT1QUwpgcaRTRlCOaQdUsw8QRiojRJ2PRi5DxNhizOS1QFX/NRQ4ZoUS7ovQBREQk+jSaJd9AwkBSj1bjZRFDDQTV/mfyt8WoMGWIc6It8VMpIQZH3FjPCWDlkt145Jcjsj5Cn4dL6yz7DLeK3ifmt2AyjsO82FS53rlPHXH2UdwIPYFAQdci66K/8UclUTFGZMgQhJV7SebD3+wy+UJO6hbZ7t4Tu10WznnKcVCvyaOnQCdP36Uot3F/ttbp9fPEguU/DpbxPmQKp2nEzltKoSOGj327TVUJqgae+CR8buXY7x1T+xSk0ZkgsKSQBd9kit+grxWWIZlIEExO5ykLqADKLYMjQY+1MmtsPdauaRHOGmKzhwQUcqmL4AEeyhxgyJHYGKk+wLwoS+zLpiMvQLfXTEhzx7Rh5ZtCQPsOMIT+FeMYEbI2qOoPlBJ17Dm09iaDWZIp1IbZLK71HjE+UqjQAyejDhpoz3G2ClXzVlijSvTZMxsZOkwto+8Jek6Cd2xUj/IZy36AXir/O9RI2RVHnS6CGqNwyFIipiRoO4HjdqIydbiszhI732KFJ5rqa0w+k7qMrIPEbhk6pfW04iTmVnBYOb/Pm+zJdt95sHN4eHdY2S7r9ia5TKnb9hrdHjXyhrt/K6LQatw2tjN6wMppmjgjh9lIxYQ1jjnkwKKhGOM6wD7lhI9fg3JHfRrvR0WNy3cIGUzzqK09XzgLWWCU8Zgmi/y3ZijdexBYGU9ww7lroczOITnRJLd+Y4DrFZrdZnMBxoxt2JZSdRYyOPE3uOIlTCG3+hawIOhI8juCSSBCjqAnqohPFFBtdb5wT6XEiei49MRuduEjnJ6IqrDNa0a1+MeExUW9actoixG7UYszHZrybtRvJxsXamDgOCK5lqJOWynPd9AFZpSeSAOFSfNPgGQ7OcI7hMTeshGqPytIUbxUb8eMDMgu/8fwGOBz5MTcDT40+Kis58yQV1OCQ7FgYQp5desLc9+dH47jm8/tA9zfksPMy8/BGfajbFZ/h77/wHDuJF0jXW+OOAYsrPY8t9jR+u+mN7IRwUvrlPvvLZ45ju5BggfSHdfP+1xzT0Z7JxQrX3NM73WKJbOpJhtRaCKIrD4s9n+NHnuNmvE4dxykVfuDvHJCerBTxOs2jkjvKP24WCtpjSGq8CQHS1FtcXLzPvuM59h8Lxth8zN/mRL02vv2jyk/jePFjeXHAcVXgOCKu41zFsz7Jy2l+DhguLj6tPv93fL0uxb2GZ4IX1PxBGI6TY4IrePx5nNQlNZ+R4bg47gxdIhTY2r4b3nsCUAwHHN/+PlJvd9sj3fe1fjKBmfy0yODp/u1PSbva2U52CxY7k+sn+1djvbLtxzJL0V8g43M8v9o/WR/xtjYW1VfryyMCFtqfeYYBx+94Dscn64pHrr8az3V74wcZ+heR4WK5J3HmzsYggl8XxOf9LGEYzKPozF0lWQWmCEjo9aQMA47v+HncM7j6yR7A4Y5PCoaLgTP3P96mzBBHSHYJxpTGk8jx+NJWy8IDNmB9r2ModXSOT2aDI1xt8G89Q7kztz0THEmh8qPK1NAcRWduf6wL/GQwzJgyHO+fRY5G1wZOE5Cu1BhTCr1V0Zm7tpwjFJslfpuco8SZO7WaI2xsGWJMGY7Z7/7kOFrtzBG/7YspwXAeBYc1ccg7ecDWnRgMQ4eVn8c9WznC0QATY0pDkpk7ttOZgxBR67dJIXHm7mx05sAzNTWmLMdnwWE9Gf7Irw0ytD8SMJRyPLfOmSPZO0UQbMLRdocVCgbJCIYc7XZYDYLgYehJnHKLnLnkxpTmKMk+WuPMxffbVBwFZ+7UElklwxkaBBtwFBwdO/wcUrf7a1SGIUeOohWzGCcIHgremTsd/vzJYwzGlMJTlnXmps1uAPDb/hldTAdYza7SHG2IHMdkTAnKq1mfYuTL2WBr4Gr7kY1piOwqs6vDikWRBMEfx0KQXxanTS7A2IxpefGJd8PtCKZgd+CnEcW0dy+kb2R7n6eAUYJgip+kLn5mSRgFG8qTG1OJeKYTbqmZDEgQnNRvK0vE0/dmbFgJAZBRTMawJ9l+c2xZmA9+W3xjqhDPEX49bzJIHAT74iluZ0z4w3kTRdzyDMHTqmg97cu0hSDDi5NR7N1ns4J82rsVhRjTj3EKUNns8wyIJyBmRvHJjx/8CIKJ58/t3rkQMwjuZQOG7yjxtCFI0gEOdZga0/uAYvYBCA799bipI3YQHIpppIhWRIE6wP3T5kFwKKdY0ufP+NoHsu/4L1OCoIq4XliRU9MhfhD8xKmiHaGuGvG21QS451TR4sVwgCQZRW5RPB/+lGkiSUaRV8Wz4Y+ZJpJkFENVfIupNbtVkRjTzzEIzpgqJsso8qpos2sKQbAqo1iWvk5UEbMY+h/GnS70xrTc+/vvnuwdooqYh7JYFbUbvsv/DN6SuuW8KlocY2gyiuUfNRLMq6IVRV8p1BnF8ify1p8yM8SrouJ3cS2AOqPYQy2THY8CBxUbSe6hsQNgTP/mWZS/oJLJk3GzoopbChLl79MUBP4SVbRj/4UEZHhcRhGszLeginsyY4pWxkQVMf1tadqG+G0P7Cw9cAzlC2aoim+xkZ2JYWlGEa3MHp471qjiO7tVUZJRpKzMFl6U8zCzqigGwZSVWaZuWJEezQhVcdVqVRQO6lFWJnCo8Z4ctSpm7VZF4rdFGUW0MuElM3gfp9wHnwFV5ILgyJfZI4FtdGeVNE7mVHFP/7RpgM0o0lYGWuBVjtLMcc96VWSC4DAkBCsDiKeK1h0Soo0pb2W4JoaqaF29hsoo9nCU7FVWRqqI1f27KRFRgmQUHxYpX4bfmGakiri51PCmr68GPKgnszIAvMtJqopPnCpq7xP8+sCMIuPLcJhpVQRj+ofUygCiaw6fZBTtLp2mOcjVCIRZvqk4VMUsqqJdpdNjlqBq+yteHSfdYWS1Kp6yDFWeZRVbSDPkNu9iOGEIqitJkSpqksSoijbVa7ZogjrpQlWUVuNsLp1Gt6QPWazxzjidKlq5iwFy+8PqZDFV0abS6UmQcTofmpqP7ho3UUWrYsXq8snJsoFtQKtkpIq2Zvq1QIGW7m64Z3cx2BcNG6CK/oGsXkMmEVTR5vK3GlpV5LagziZDShXFcDiUUoyFZ1JKF3Sq2AvqGNFJBetSNoao4o24nCr22CDRthgqBhSq+MRIaNrOBLgh8LcbaFUcnAR+S5/ntslriw0MuFAVeQmd0eU+Aq+KT0w+0ceShQWMWIjqNYEqChI6q+sEBVTFh145kNBnujI+wzYmQlQ6fWICirThj1vMAFAVf1r95iQ0RKSKz8/0bQOz6shIwPzcD+DOphzbyNgXCdpWlBkVezxBq/LA48AWy+/bktAQzI/92FWrGBdOvmEJJXhNdr5dfYMSSlDd3d85G8cvlMwxxxxzzDHHHHPMYQH+D/irMyh0j04dAAAAAElFTkSuQmCC"
        type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <title>Post</title>
    <style>
        body {
            background: #eee;
        }

        .widget {
            position: relative;
            margin-bottom: 30px;
            padding: 0px 20px;
            background: #fff;
            border-radius: 3px;
        }

        .widget-controls {
            position: absolute;
            z-index: 1;
            top: 0;
            right: 0;
            padding: 14px;
            font-size: 12px;
        }

        .widget-controls>a {
            padding: 1px 4px;
            border-radius: 4px;
            color: #fff;
            -webkit-transition: color 0.15s ease-in-out;
            -o-transition: color 0.15s ease-in-out;
            transition: color 0.15s ease-in-out;
        }

        .text-white {
            color: #fff;
        }

        .widget-top-overflow {
            margin-top: -15px;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }

        .widget-top-overflow,
        .widget-middle-overflow {
            position: relative;
            margin: 0 -20px;
        }

        .widget-top-overflow>img {
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }

        .widget-top-overflow>img,
        .widget-middle-overflow>img {
            max-width: 100%;
        }

        .widget-top-overflow>img+.tags {
            position: absolute;
            bottom: 0;
            right: 0;
            margin: 20px;
        }

        .tags {
            padding-left: 0;
            list-style: none;
        }

        .tags>li {
            float: left;
            margin: 3px;
        }

        .tags>li>a {
            padding: 2px 8px;
            font-size: 13px;
            border-radius: 6px;
            border: 1px solid white;
            color: inherit;
            text-decoration: none;
        }

        .mt-sm {
            margin-top: 10px;
        }

        .post-user {
            position: relative;
        }

        .mr {
            margin-right: 15px;
        }

        .thumb-xs,
        .thumb-sm,
        .thumb-lg,
        .thumb {
            position: relative;
            display: inline-block;
            text-align: center;
        }

        .thumb {
            width: 48px;
        }

        .thumb img {
            height: auto;
            max-width: 100%;
            vertical-align: middle;
        }

        .post-user img {
            border: 3px solid white;
        }

        .fs-mini {
            font-size: 13px;
        }

        .text-light {
            opacity: .8;
        }

        .widget>footer {
            margin: 0 -20px -15px;
            padding: 30px 20px;
        }

        .bg-body-light {
            background-color: #f6f6f6;
        }

        .post-links {
            margin-bottom: 0;
            font-size: 12px;
            padding-left: 0;
        }

        .post-links>li {
            float: left;
            list-style: none;
            margin: 4px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
          /
            <li class="nav-item">
                <a class="nav-link" href="{{ route('posts.admin') }}">Manage Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.logoutPost') }}">Logout</a>
            </li>
        </ul>
    </nav>
    <div class="container bootstrap snippets bootdey">
        <!-- Button trigger modal -->
        <div class="d-flex justify-content-end align-items-center pt-5">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                Add Post
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <img id="previewImage"
                                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVEpml402yk5zw_sBrH_-GMe_ZaaTCP82r4A&s"
                                                alt="product" width="150">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="thumbImage">Thumbnail Image</label>
                                        <div class="custom-file">
                                            <input name="thumb_image" type="file" class="custom-file-input"
                                                id="imageUpload" accept="image/*">
                                            <label class="custom-file-label" for="customFileLang"></label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Description</label>
                                        <input type="text" class="form-control" id="description" name="description"
                                            required>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="author_id">Author ID</label>
                                        <select class="form-control" id="author_id" name="author_id" required>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"> {{ $user->name }}
                                                </option>
                                            @endforeach
                                            <!-- Include options for categories here -->
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="author_type">Author Type</label>
                                        <select class="form-control" id="author_type" name="author_type" required>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->name }}"> {{ $user->name }}
                                                </option>
                                            @endforeach
                                            <!-- Include options for categories here -->
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="categoryid">Category</label>
                                        <select class="form-control" id="categoryid" name="categoryid" required>
                                            @foreach ($categorys as $category)
                                                <option value="{{ $category->id }}"> {{ $category->name }}
                                                </option>
                                            @endforeach
                                            <!-- Include options for categories here -->
                                        </select>
                                    </div>

                                </div>



                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                            </div>


                            <button type="submit" class="btn btn-primary">Add New Post</button>
                    </div>

                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="row pt-5">
            @foreach ($posts as $post)
                <div class="col-md-6">
                    <section class="widget">
                        <div class="widget-body">
                            <div class="widget-top-overflow text-white">
                                <img src="{{ url('image/post/' . $post->thumb_image) }}" height="370">
                                <ul class="tags text-white pull-right">
                                    <li><a>{{ $post->author_type }}</a></li>
                                    <li><a>{{ $post->category->name }}</a></li>
                                </ul>
                            </div>
                            <div class="post-user mt-sm">
                                <span class="thumb pull-left mr">
                                    <img class="img-circle" src="https://bootdey.com/img/Content/user_1.jpg"
                                        alt="img new">
                                </span>
                                <h5 class="mb-xs mt-xs">
                                    <a href="{{ route('showpost', ['id' => $post->id]) }}"
                                        style="text-decoration:none">
                                        <span class="fw-semi-bold">{{ $post->name }}</span>
                                    </a>
                                </h5>
                                <p class="fs-mini text-muted"><time><i class="fa fa-calendar"></i>
                                        {{ $post->created_at }}</time> &nbsp; </p>
                            </div>
                            <p class="text-black fs-mini m">{{ $post->description }}</p>
                            <div class="d-flex justify-content-end align-items-center">
                                <div class="btn-group">
                                    <form id="deleteForm" action="{{ route('posts.destroy', ['id' => $post->id]) }}"
                                        method="post">
                                        @csrf

                                        <button type="submit" class="btn btn-sm bg-white"
                                            onclick="confirmDelete(event)"><i
                                                class="fa fa-trash text-danger"></i></button>
                                    </form>
                                    <form action="{{ route('posts.edit', ['id' => $post->id]) }}" method="get">
                                        @csrf

                                        <button type="submit" class="btn btn-sm bg-white"><i
                                                class="fa fa-pencil text-warning bg-white"></i></button>
                                    </form>
                                    <a href="{{ route('showpost', ['id' => $post->id]) }}"
                                        class="btn btn-sm bg-white"><i class="fa fa-eye text-success"></i></a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            @endforeach

        </div>
        <div class="d-flex justify-content-end align-items-center">
            {{ $posts->links('posts::custom-pagination') }}

            {{-- <p>Trang hiện tại: {{ $products->currentPage() }}</p> --}}
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        function confirmDelete(event) {
            // Hiển thị hộp thoại xác nhận
            var result = confirm("Bạn có chắc chắn muốn xóa?");

            // Nếu người dùng chọn "OK" (đồng ý xóa), tiếp tục gửi form
            if (result) {
                document.getElementById('deleteForm').submit();
            } else {
                event.preventDefault(); // Ngăn chặn hành vi mặc định của sự kiện click
            }
        }
        // Function to handle the image upload
        function handleImageUpload() {
            const fileInput = document.getElementById('imageUpload');
            const previewImage = document.getElementById('previewImage');

            // Check if a file is selected
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        // Attach event listener to the file input
        document.getElementById('imageUpload').addEventListener('change', handleImageUpload);
    </script>

</body>

</html>
