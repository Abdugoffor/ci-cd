<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PDF</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <style>
        body {
            margin: 0 auto;
            background: #f5f5f5;
            min-height: 100vh;
            width: fit-content;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .badge-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0;
        }

        .badge {
            break-inside: avoid;
            page-break-inside: avoid;
            width: 148.5mm;
            height: 100%;
            background: linear-gradient(174deg,
                    #2488a6 -69.71%,
                    #c5e0e8 16.96%,
                    #fff 95.34%);
        }

        .download-btn {
            background: #2488a6;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-family: "Unbounded";
            font-size: 16px;
            transition: background 0.3s;
            margin-top: 20px;
            min-width: 200px;
            text-align: center;
            width: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0px;
            margin-top: 10px;
        }

        .download-btn:hover {
            background: #1b6d8a;
        }
    </style>
</head>

<body>
    <div class="badge-container" id="badgeContainer">
        <div class="badge"
            style="
          background: linear-gradient(
            174deg,
            #2488a6 -69.71%,
            #c5e0e8 16.96%,
            #fff 95.34%
          );
          position: relative;
          display: flex;
          flex-direction: column;
          width: 148.5mm;
          height: 794px;
          overflow: hidden;
        ">
            <div
                style="
            height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            overflow: hidden;
          ">
                <div class="badge-header"
                    style="
              height: 150px;
              display: flex;
              width: 100%;
              justify-content: space-around;
              align-items: center;
            ">
                    <div class="nav-left" style="    display: flex;
    align-items: center;
    gap: 20px;">
                        <div class="logo-wrapper" style="  display: flex;
    align-items: center;
    gap: 12px;">
                            <img src="/frontend/assets/header_banner/chess_logo.svg" alt="Chess Olympiad 2025"
                                style="  width: 70px;
    height: 80px;
    object-fit: contain;" />

                            <div class="logo-text"
                                style="  font-size: 9.575px;
    font-style: normal;
    font-weight: 400;">
                                <div>{{ getLocale($siteSettings?->name) ?: 'Chess Olympiad' }}</div>
                                <strong
                                    style="font-size: 13.88px;">{{ getLocale($siteSettings?->title) ?: 'Chess Olympiad' }}</strong>
                            </div>
                        </div>
                        <div class="nav-line"
                            style="   height: 49.8px;
    width: 1.9px;
    background-color: #00363f;"></div>
                        <img class="fide-logo" style=" width: 60px;
    height: 60px;
    object-fit: contain;"
                            src="{{ asset('frontend/assets/header_banner/fide.svg') }}" alt="fide" />
                    </div>
                    <div class="header-right"
                        style="
                display: flex;
                flex-direction: column;
                margin-left: 20px;
              ">
                        <div style="display: flex; align-items: center; gap: 20px">
                            <div style="position: relative; margin-top: 5px;">
                                <img src="{{ asset($participant->qk_code_path) }}" alt="sponsor2"
                                    style="width: 100%; height: 60px; object-fit: contain" />
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $color = optional($participant->accreditationCategory)->color;

                    if (!isset($color)) {
                        $color = '212deg,
                        #a52629 5.64%,
                        rgba(215, 46, 59, 0.54) 102.91%,
                        rgba(239, 64, 87, 0) 137.49%';
                    }

                @endphp

                <div class="badge-info"
                    style="
              height: 450px;
              width: 148.5mm;
              background: linear-gradient({{ $color }});
              display: flex;
              align-items: center;
              justify-content: center;
            ">
                    <div class="content-block" style="display: flex; gap: 25px; align-items: center">
                        <div class="block-left" style="display: flex; flex-direction: column; gap: 15px">
                            <img src="{{ asset($participant->photo) }}" alt="photo-svg"
                                style="
                    width: 180px;
                    height: 250px;
                    flex-shrink: 0;
                    object-fit: cover;
                    border-radius: 8px;
                  " />
                            <span
                                style="
                    color: #fff;
                    font-size: 19.692px;
                    font-style: normal;
                    font-weight: 600;
                    line-height: 102%;
                    letter-spacing: 1.378px;
                    text-align: center;
                  ">{{ optional($participant->country)->label_en }}</span>
                        </div>
                        <div class="block-right" style="display: flex; flex-direction: column; gap: 15px">
                            <div class="block-right-top"
                                style="
                    color: #fff;
                    font-size: 22.974px;
                    font-style: normal;
                    line-height: 102%;
                    letter-spacing: -0.23px;
                    text-transform: uppercase;
                  ">
                                <div>
                                    {{ $participant->first_name }}<br />{{ $participant->last_name }}
                                </div>
                                <br />
                                <div
                                    class="color: #fff; font-size: 29.538px; font-style: normal; font-weight: 600; line-height: 102%; letter-spacing: 0.295px; margin-top : 12px;">
                                    {{ getLocale(optional($participant->accreditationCategory)->name) }}
                                </div>
                            </div>
                            <div class="block-right-bottom" style="display: flex; gap: 10px; align-items: center">
                                <img src="{{ asset('frontend/assets/badge/img.svg') }}" alt="bottom-img"
                                    class="bottom-img"
                                    style="
                      width: 112px;
                      height: 112px;
                      border-radius: 5.103px;
                      object-fit: cover;
                    " />
                                <div
                                    style="
                      display: flex;
                      padding: 12px;
                      align-items: center;
                      justify-content: center;
                      gap: 16.41px;
                      border-radius: 6.564px;
                      background: rgba(168, 55, 60, 0.52);
                    ">
                                    <img src="{{ asset($participant->qk_code_path) }}" alt="bottom-qr"
                                        class="bottom-qr" style="width: 100%; height: 100px; object-fit: contain" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="badge-number"
                style="
            height: 60.951px;
            background: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 27.897px;
            height: 100px;
            overflow: hidden;
          ">
                <div
                    style="
              color: #23292c;
              font-size: 26.256px;
              font-style: normal;
              font-weight: 700;
              line-height: 102%;
              letter-spacing: 0.525px;
            ">
                    {{ $participant->passport_number }}
                </div>
            </div>
            <div class="badge-footer"
                style="
            background: rgba(210, 231, 237, 0.56);
            display: flex;
            align-items: center;
            padding: 5px 0;
            justify-content: center;
            gap: 30px;
            height: 94px;
            overflow: hidden;
          ">
                @foreach ($partners as $partner)
                    <img src="{{ asset($partner->photo) }}" alt="{{ $partner->photo }}"
                        style="
          max-width: 73px;
          width: 100%;
          object-fit: contain;
          max-height: 44px;
          height: 100%;
        " />
                @endforeach
            </div>
        </div>
        <div class="badge"
            style="
          background: linear-gradient(
            174deg,
            #2488a6 -69.71%,
            #c5e0e8 16.96%,
            #fff 95.34%
          );
          position: relative;
          display: flex;
          flex-direction: column;
          height: 794px;
          overflow: hidden;
        ">
            <div
                style="
            height: 600px;
            border: 1.625px solid rgba(0, 0, 0, 0);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
          ">
                <div
                    style="height: 255px; width: 241px; border: 1px solid black; padding: 30px; display: flex; justify-content: center">
                    <div style="width: 100%; display: flex; flex-direction: column; gap: 15px; align-items: center;">
                        @if ($participant->zones && count($participant->zones) > 0)
                            @foreach ($participant->zones as $zone)
                                @if ($loop->index == 0)
                                    <div
                                        style="
                                    width: 100%;
                                    background: #176670;
                                    color: white;
                                    padding: 8px 15px;
                                    text-align: center;
                                    border-radius: 5px;
                                    font-size: 22px;
                                    font-weight: 600;
                                    margin-bottom: 5px;
                                    text-transform: uppercase;
                                ">
                                        {{ $zone->title }}
                                    </div>
                                @else
                                    @if ($loop->index % 2 == 1)
                                        <div
                                            style="
                                        display: grid;
                                        grid-template-columns: 1fr auto 1fr;
                                        gap: 10px;
                                        align-items: center;
                                        width: 100%;
                                    ">
                                            <div
                                                style="
                                            background: #f5f5f5;
                                            padding: 5px 10px;
                                            border-radius: 4px;
                                            text-align: center;
                                            font-size: 16px;
                                            text-transform: uppercase;
                                            font-weight: 500;
                                        ">
                                                {{ $zone->title }}
                                            </div>
                                            <div style="color: #176670; font-weight: bold;">|</div>
                                    @endif
                                    @if ($loop->index % 2 == 0)
                                        <div
                                            style="
                                            background: #f5f5f5;
                                            padding: 5px 10px;
                                            border-radius: 4px;
                                            text-align: center;
                                            font-size: 16px;
                                            text-transform: uppercase;
                                            font-weight: 500;
                                        ">
                                            {{ $zone->title }}
                                        </div>
                    </div>
                    @endif
                    @endif
                    @endforeach
                    @if (count($participant->zones) % 2 == 0)
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>
    <div class="badge-number"
        style="
            height: 60.951px;
            background: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 27.897px;
            height: 100px;
            overflow: hidden;
          ">
        <div
            style="
              color: #23292c;
              font-size: 26.256px;
              font-style: normal;
              font-weight: 700;
              line-height: 102%;
              letter-spacing: 0.525px;
            ">
            Доп информация
        </div>
    </div>
    <div class="badge-footer"
        style="
            background: rgba(210, 231, 237, 0.56);
            display: flex;
            align-items: center;
            padding: 5px 0;
            justify-content: center;
            gap: 30px;
            height: 94px;
            overflow: hidden;
          ">
        @foreach ($partners as $partner)
            <img src="{{ asset($partner->photo) }}" alt="footer1"
                style="
              max-width: 73px;
              width: 100%;
              object-fit: contain;
              max-height: 44px;
              height: 100%;
            " />
        @endforeach

    </div>
    </div>
    </div>
    <div class="download-btn" onclick="downloadPDF()">Скачать PDF</div>
</body>
<script>
    async function downloadPDF() {
        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF({
            format: "a5",
            orientation: "landscape"
        });
        const element = document.getElementById("badgeContainer");

        const canvas = await html2canvas(element, {
            scale: 2,
            useCORS: true
        });
        const imgData = canvas.toDataURL("image/png");
        const imgWidth = 210;
        const imgHeight = (canvas.height * imgWidth) / canvas.width;
        const dateBagik = new Date().toISOString().split('T')[0];
        doc.addImage(imgData, "PNG", 0, 0, imgWidth, imgHeight);
        doc.save(`badge_${dateBagik}.pdf`);

    }
</script>

</html>
