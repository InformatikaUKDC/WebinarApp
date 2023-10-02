<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>API DOCS WEBINAR UKDC</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        #header {
            border: 1px solid rgb(201, 201, 201);
            background: rgba(143, 143, 143, 0.18);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5.8px);
            -webkit-backdrop-filter: blur(5.8px);
        }

        #sidebar {
            height: 100vh;
            width: 250px;
            /* From https://css.glass */
            background: rgba(143, 143, 143, 0.24);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(6.8px);
            -webkit-backdrop-filter: blur(5.8px);
        }

        #content {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="text-center" id="header">
        <h2 class="container my-3">API DOCS WEBINAR UKDC</h2>
    </div>
    <div class="d-flex">
        {{-- sidebar --}}
        <div id="sidebar" class="m-3">
            <nav class="nav nav-pills p-4" aria-label="">
                <a href="#about">About</a>
            </nav>
            {{-- event API --}}
            <nav class="nav nav-pills p-4" aria-label="">
                <a href="#events">Events</a>
                <nav class="nav nav-pills flex-column" aria-label="">
                    <a class="nav-link" href="#get-events">Get Events</a>
                    <a class="nav-link" href="#get-events-detail">Get Event Detail</a>
                    <a class="nav-link" href="#create-event">Create Events</a>
                    <a class="nav-link" href="#delete-event">Delete Events</a>
                    <a class="nav-link" href="#update-event">Update Events</a>
                </nav>
            </nav>
        </div>
        <div id="content">
            <div id="about" class="mt-5 mb-5 border-bottom border-secondary">
                <p class="desc">API ini dibuat untuk menyediakan data webinar UKDC dalam bentuk response (JSON),
                    sehingga dapat
                    terintegrasi dengan Front End</p>
            </div>
            <div id="events">
                <h3>Events</h3>
                <p>Event merupakan kegiatan yang akan diselenggarakan, baik secara <i>online</i> atau <i>offline</i></p>
                <div id="get-events" class="my-3">
                    <p class="fw-bold m-0 fs-5">Get Events</p>
                    <div class="d-flex flex-row align-items-center">
                        <p class="my-0 me-2 bg-success text-white p-1 rounded">GET</p>
                        <code class="fs-5">/api/events</code>
                    </div>
                </div>
                <div id="get-events-detail" class="my-3">
                    <p class="fw-bold m-0 fs-5">Get Event Detail</p>
                    <div class="d-flex flex-row align-items-center">
                        <p class="my-0 me-2 bg-success text-white p-1 rounded">GET</p>
                        <code class="fs-5">/api/event-detail/{id}</code>
                    </div>
                </div>
                <div id="create-event" class="my-3">
                    <p class="fw-bold m-0 fs-5">Create Event</p>
                    <div class="d-flex flex-row align-items-center">
                        <p class="my-0 me-2 bg-warning text-dark p-1 rounded">POST</p>
                        <code class="fs-5">/api/event</code>
                    </div>
                    <p class="m-0">Request Body (form-data)</p>
                    <ul>
                        <li>image</li>
                        <li>title</li>
                        <li>description</li>
                        <li>background</li>
                        <li>type_activity</li>
                        <li>speaker</li>
                        <li>link_feedback</li>
                    </ul>
                </div>
                <div id="delete-event" class="my-3">
                    <p class="fw-bold m-0 fs-5">Delete Event</p>
                    <div class="d-flex flex-row align-items-center">
                        <p class="my-0 me-2 bg-danger text-white p-1 rounded">DELETE</p>
                        <code class="fs-5">/api/event-delete/{id}</code>
                    </div>
                </div>
                <div id="update-event" class="my-3">
                    <p class="fw-bold m-0 fs-5">Update Event</p>
                    <div class="d-flex flex-row align-items-center">
                        <p class="my-0 me-2 bg-info text-white p-1 rounded">PUT</p>
                        <code class="fs-5">/api/event-update/{id}</code>
                    </div>
                    <p class="m-0">Request Body (raw)</p>
                    <code>
                        {"description" : "update data"}
                    </code>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
