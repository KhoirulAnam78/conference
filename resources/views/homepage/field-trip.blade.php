@extends('layouts.main')

@section('content')
    <!-- Contact Form Section Begin -->
    <section class="contact-from-section spad" style="margin-top:200px" style="padding-top:0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Field Trip</h2>
                        {{-- <p>Fill in the form below to register.</p> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    {{-- CONTENT --}}
                    <div class="row justify-content-center">
                        <div class="col-lg-6 mb-3">
                            <div class="card">
                                <img style="height:320px" class="card-img-top"
                                    src="{{ url('') }}/assets/img/field-trip/ft-1.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">1000 Pillar Mosque</h5>
                                    <p class="card-text">The Al-Falah Grand Mosque is the largest mosque in Jambi,
                                        Indonesia. This mosque is also known as the '1000 Pillar Mosque,' even though it has
                                        only 256 pillars. It was built in 1971 and completed in 1980. The structure
                                        resembles an open pendopo with numerous supporting pillars and a large dome atop it.
                                        The location of this Grand Mosque stands where the former center of the Jambi Malay
                                        kingdom was, once the site of the Tanah Pilih palace of Sultan Thaha Syaifuddin.</p>
                                    <a href="https://id.wikipedia.org/wiki/Masjid_Agung_Al-Falah"
                                        class="primary-btn">Wikipedia</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 mb-3">
                            <div class="card">
                                <img style="height:320px" class="card-img-top"
                                    src="{{ url('') }}/assets/img/field-trip/ft-2.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">The Gentala Arasy Bridge</h5>
                                    <p class="card-text">The Gentala Arasy Bridge is a pedestrian bridge spanning the
                                        Batanghari River. The bridge connects Tepian Tanggo Rajo to Jambi Kota Seberang. The
                                        Gentala Arasy Bridge is the first pedestrian bridge with a winding S-shaped contour,
                                        setting it apart from typical bridges. The bridge was inaugurated in March 2015,
                                        with the honor of inauguration performed by Vice President Jusuf Kalla. This
                                        connecting bridge has a length of 503 meters and a width of 4.5 meters.</p>
                                    <a href="https://id.wikipedia.org/wiki/Gentala_Arasy" class="primary-btn">Wikipedia</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 mb-3">
                            <div class="card">
                                <img style="height:320px" class="card-img-top"
                                    src="{{ url('') }}/assets/img/field-trip/ft-3.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Muaro Jambi Temple</h5>
                                    <p class="card-text">The Muaro Jambi Temple is the largest Hindu-Buddhist temple
                                        complex in Southeast Asia, spanning an area of 3981 hectares. It is believed to be a
                                        significant relic of the Sriwijaya and Malay kingdoms. This temple complex is
                                        situated in the Maro Sebo Subdistrict of Muaro Jambi Regency, Jambi, Indonesia,
                                        precisely on the banks of the Batang Hari River.</p>
                                    <a href="https://id.wikipedia.org/wiki/Kompleks_Candi_Muaro_Jambi"
                                        class="primary-btn">Wikipedia</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 mb-3">
                            <div class="card">
                                <img style="height:320px" class="card-img-top"
                                    src="{{ url('') }}/assets/img/field-trip/ft-4.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Geopark Merangin</h5>
                                    <p class="card-text">Geopark Merangin is an ancient heritage site located in Merangin
                                        Regency. This geopark houses a collection of fossils including leaves, wood, roots,
                                        animals, and mollusks. These fossils are estimated to be over 300 million years old
                                        and are scattered along the course of the Batang Merangin River and Mengkarang
                                        River.</p>
                                    <a href="https://id.wikipedia.org/wiki/Taman_Bumi_Merangin-Jambi"
                                        class="primary-btn">Wikipedia</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 mb-3">
                            <div class="card">
                                <img style="height:320px" class="card-img-top"
                                    src="{{ url('') }}/assets/img/field-trip/ft-5.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Kerinci</h5>
                                    <p class="card-text">Kerinci is the westernmost regency in the province of Jambi,
                                        Indonesia. This regency is a prominent tourist destination in the province, known as
                                        the 'Land Beneath the Heavens'.</p>
                                    <a href="https://id.wikipedia.org/wiki/Kabupaten_Kerinci"
                                        class="primary-btn">Wikipedia</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
