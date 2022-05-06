@extends('layouts.app')

@section('title', 'Fibonashi - Welcome')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/index.js') }}" type="text/javascript" defer></script>
@endpush

@section('content')
    <section class="relative" id="welcome-image-container">
        <img src="{{ asset('assets/images/foggy.jpg') }}" id="welcome-image" alt="">
        <div id="above-welcome-section-container" class="relative">
            <div id="welcome-title-and-text-container">
                <div class="align-center">
                    <svg class="title-feather" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><path d="M35.82,55.57c6.46-4.42,13.93-4.85,21.36-5.19,3.22-.14,3.87-.61,2.78-4.08C55.46,32,63.36,9.89,75.46,1.59c2.9-2,5.61-1.39,8.3.33C98,11,110,21.51,109.25,40.44c-.14,3.5,2.19,2,3.56,1.61a69.14,69.14,0,0,1,15.86-2.27c4.2-.15,6.65,1.52,7.69,5.72,3,12,3.69,23.87-1.3,36,5.48.74,7.4,4.49,8.36,9.62,2.15,11.54,2.83,22.89-2.82,33.67-1.51,2.89.5,2.88,2.05,3.36A55,55,0,0,1,161.2,138.5c2.79,2.28,3.89,5.08,2.14,8.4-7.29,13.82-16.35,25.39-34.61,25.89,6,5.73,12.67,9.39,19.53,12.72,2,.94,4.07,1.59,6,2.6,3.12,1.65,5,4.11,3.42,7.76s-4.47,4.58-8.31,3.11a100.31,100.31,0,0,1-34.29-22,93.8,93.8,0,0,1-19.8-27.31c-1.44-3-3.1-4.08-6.37-3.44A45.41,45.41,0,0,1,70,145.71c-14.7-3.37-22-13.86-25.67-27.56a107.46,107.46,0,0,1-2.11-12.3c-.69-4.84-.32-9.29,6-11.14-7.47-7-8.75-16.47-12.33-24.83Zm66.88,67.31a55.13,55.13,0,0,1,.77,5.86c.14,2.54,1,3.22,3.66,3,19.51-1.93,29.11-14.84,25.34-34.11-.41-2.1-.84-3.19-3.29-2.89C112,96.8,102.48,104.38,102.7,122.88ZM64.15,104.55c-.58,0-2.55.24-4.52.3-4.15.14-5.68,1.66-4.81,6.21,4,20.83,15.32,26.15,34.71,23.16,1.76-.27,2.47-1,2.2-2.71C89.4,117.07,84.67,104.52,64.15,104.55Zm6-67.21C70.64,46.25,77,52.27,84.08,58c2.58,2.1,3.79,1.36,5.6-.94,12-15.26,9.41-31.08-6.82-41.5-1.67-1.07-2.73-1.72-4.23.34C74.14,22,70.36,28.42,70.15,37.34Zm56.73,25.79c-.22-2.77-.46-5.54-.65-8.31-.16-2.26-1.23-3-3.52-2.69-21.47,3.25-28.51,13.47-25.56,34,.26,1.8.55,3.36,3.26,3C117,87.05,127.21,79.77,126.88,63.13ZM74.56,92.81c2.93-.41,5.86-.84,8.79-1.21,1.58-.21,2.23-.72,2.19-2.63-.39-19-17.67-31.82-35.26-26.09-1.57.51-2.29,1.1-2,2.89C50.59,82.62,57.29,92.67,74.56,92.81Zm54.08,67.69c8.42.29,19.09-7.18,21.22-13.74.42-1.28-.05-1.69-.78-2.39-5.46-5.37-17.56-7.63-23.82-4.1-5.41,3.06-12.37,8-11.14,13.14C115.31,158.39,123.7,159.86,128.64,160.5Z"></path></svg>
                    <svg id="logo-above-title" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 90">
                        <path d="M63.41,34.07c-.88-3-2.16-6-3.52-7.52-1.68-1.76-2.72-2.08-6.56-2.08h-6c-2.72,0-3,.16-3,2.88V44.79h8.56c4.72,0,5.36-1.2,6.56-6.8h3V55.75h-3c-.88-5.44-2.08-6.8-6.48-6.8H44.29V61.43c0,7.36.48,7.92,7.68,8.4v3H26.37v-3c6.08-.56,6.8-1,6.8-8.4V32c0-7.12-.72-7.76-6.8-8.24v-3H53.49c6.88,0,10.88-.08,12.16-.16.08,1.36.48,8.24.88,13Zm8.88,38.72v-3c6.08-.56,6.8-1,6.8-7.76V31.59c0-6.72-.8-7.36-6.8-7.84v-3H97v3c-6,.56-6.8,1.12-6.8,7.84V62.07c0,6.64.72,7.12,6.8,7.76v3Zm62.48-28.64c8.4,1.52,14.32,5.52,14.32,13.12,0,5-3.12,9.6-7.68,12.16-4.08,2.24-9.28,3.36-15.2,3.36h-22.4v-3c6.16-.64,6.8-1,6.8-7.76V31.59c0-6.72-1-7.44-6.72-7.84v-3h24.32c6.08,0,9.92.8,13.12,2.8a10.28,10.28,0,0,1,4.88,8.88C146.21,39.11,140,43.11,134.77,44.15Zm-10.16-1c7.6,0,10.4-3.28,10.4-9.2,0-7-4.56-9.6-9-9.6a7.65,7.65,0,0,0-3.76.64c-.88.56-.8,1.28-.8,3v15.2Zm-3.12,18.8c0,5.76,2.64,7.52,7,7.44s8.72-3.92,8.72-11.36c0-7.76-3.92-11.44-12.88-11.44h-2.8Zm163.2-38.16c-4.88.64-6.4,1.68-6.64,5.28-.24,3.12-.49,5.84-.49,12.8V73.67h-4.47l-33.37-40V51.75a121.5,121.5,0,0,0,.4,12.4c.32,3.52,2,5.36,7.92,5.68v3H228.2v-3c4.56-.4,6.56-1.6,7-5.36a107.59,107.59,0,0,0,.48-12.72v-19c0-2.64-.16-4.4-1.68-6.48s-3.36-2.24-6.72-2.56v-3h15.6L273.4,56.23V41.83c0-7-.07-9.6-.31-12.56-.24-3.44-1.53-5.12-8.17-5.52v-3h19.77Zm29.51,49v-3c5-.72,5-1.6,3.92-5-.8-2.4-2.08-6-3.28-9.2h-15.6c-.88,2.48-2,5.52-2.8,8-1.68,5,.24,5.68,6.56,6.24v3H283.24v-3c5-.64,6.32-1.36,9-8.08l16.64-41.36,3.85-.72c5.12,13.92,10.55,28.16,15.75,41.52,3,7.44,3.69,8,8.88,8.64v3Zm-7-38.24c-2.32,5.76-4.56,11.12-6.56,17h12.72ZM371.48,34c-1.6-5.12-3.84-11-11.2-11a7.37,7.37,0,0,0-7.68,7.76c0,4.4,3,7,10,10.56,8.56,4.24,14,8.4,14,16.32,0,9.44-7.84,16.32-19.28,16.32-5.12,0-9.68-1.36-13.44-2.48-.48-1.84-1.84-10.16-2.4-13.92l3.12-.72c1.6,5,6.08,13.76,13.92,13.76,4.88,0,7.84-3,7.84-8.16,0-4.64-2.88-7.36-9.6-11C348.44,47,343,43,343,34.71s6.56-15,18.56-15A59.14,59.14,0,0,1,373,21.11c.32,3,.88,7.12,1.52,12.16Zm68.88-10.24c-6.24.64-6.8,1.12-6.8,7.76V62.15c0,6.64.64,7.12,6.8,7.68v3H415.64v-3c6.32-.8,6.8-1,6.8-7.68v-15h-21.6v15c0,6.64.72,7,6.72,7.68v3H382.92v-3c5.92-.64,6.8-1,6.8-7.68V31.51c0-6.64-.72-7.28-6.8-7.76v-3h24.64v3c-6.08.56-6.72,1.12-6.72,7.76V43h21.6V31.51c0-6.64-.8-7.12-6.8-7.76v-3h24.72Zm6.8,49v-3c6.08-.56,6.8-1,6.8-7.76V31.59c0-6.72-.8-7.36-6.8-7.84v-3h24.72v3c-6,.56-6.8,1.12-6.8,7.84V62.07c0,6.64.72,7.12,6.8,7.76v3Z"/>
                        <path d="M204.29,46.25a2.17,2.17,0,0,0-2.62,1.17,2.13,2.13,0,0,0,.58,3,28.32,28.32,0,0,0,5.38,3c1.85.75,2.89-.4,3.29-2.33-.22-.48-.32-1.22-.74-1.56A20,20,0,0,0,204.29,46.25Z" stroke-miterlimit="10" stroke-width="1.5px"/>
                        <path d="M181.08,20.32c-9.69,3.53-15.69,10.52-18.35,20.46-3.77-2.83-3.8-3.37-.3-5.44a2.42,2.42,0,0,0,1.31-2.86c-.36-1.48-1.47-1.87-2.88-1.76-5.36.43-7.91,5.35-5.15,10a17.25,17.25,0,0,0,4.63,5,4.38,4.38,0,0,1,2,3.61,28.07,28.07,0,0,0,21,25.12,28.32,28.32,0,1,0-2.22-54.15Zm32.61,28.36c-.29,10.83-10.23,20.89-21.45,21.6-12,.75-22.93-7.55-24.41-18.61.12-.13.25-.25.38-.38-.16-.2-.33-.33-.51-.23.18-.1.35,0,.51.23h0c3.18,1.53,6.34,3.1,9.55,4.56a2.66,2.66,0,0,1,1.63,2c1.23,4.24,4,6.4,7.76,6.42a8,8,0,0,0,7.66-5.37,8.21,8.21,0,0,0-3.07-9.14c-3.1-2.14-6.72-1.94-10,.86a2,2,0,0,1-2.7.34c-2.95-1.54-5.89-3.09-8.91-4.49-2.69-1.25-3.52-3-1.78-5.87,2.36,1.33,4.77,2.69,7.17,4.07,1.48.85,3.06,1.31,4.09-.42s0-3.08-1.67-4c-1.92-1-3.73-2.3-5.7-3.21-2.19-1-1.94-2.07-.67-3.71,5.77-7.39,13.36-10.66,22.52-9.2,8.89,1.4,15.1,6.55,18.17,15.19l-.63.51.67.29-.67-.29h0l-4.93-2.66c-1.38-.76-2.71-.66-3.55.7s-.37,2.8,1.11,3.67c2.61,1.52,5.21,3,7.86,4.49A2.59,2.59,0,0,1,213.69,48.68Zm-26.47,4.1c4.51,0,4.5,7,0,7S182.71,52.78,187.22,52.78Z" stroke-miterlimit="10"/>
                    </svg>
                    <svg class="title-feather" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><path d="M164.18,55.57c-6.46-4.42-13.93-4.85-21.36-5.19-3.22-.14-3.87-.61-2.78-4.08,4.5-14.28-3.4-36.41-15.5-44.71-2.9-2-5.61-1.39-8.3.33C102,11,90,21.51,90.75,40.44c.14,3.5-2.19,2-3.56,1.61a69.14,69.14,0,0,0-15.86-2.27c-4.2-.15-6.65,1.52-7.69,5.72-3,12-3.69,23.87,1.3,36-5.48.74-7.4,4.49-8.36,9.62-2.15,11.54-2.83,22.89,2.82,33.67,1.51,2.89-.5,2.88-2,3.36A55,55,0,0,0,38.8,138.5c-2.79,2.28-3.89,5.08-2.14,8.4C44,160.72,53,172.29,71.27,172.79c-6,5.73-12.67,9.39-19.53,12.72-2,.94-4.07,1.59-6,2.6-3.12,1.65-5,4.11-3.42,7.76s4.47,4.58,8.31,3.11a100.31,100.31,0,0,0,34.29-22,93.8,93.8,0,0,0,19.8-27.31c1.44-3,3.1-4.08,6.37-3.44a45.41,45.41,0,0,0,18.93-.51c14.7-3.37,22-13.86,25.67-27.56a107.46,107.46,0,0,0,2.11-12.3c.69-4.84.32-9.29-6-11.14,7.47-7,8.75-16.47,12.33-24.83ZM97.3,122.88a55.13,55.13,0,0,0-.77,5.86c-.14,2.54-1,3.22-3.66,3-19.51-1.93-29.11-14.84-25.34-34.11.41-2.1.84-3.19,3.29-2.89C88.05,96.8,97.52,104.38,97.3,122.88Zm38.55-18.33c.58,0,2.55.24,4.52.3,4.15.14,5.68,1.66,4.81,6.21-4,20.83-15.32,26.15-34.71,23.16-1.76-.27-2.47-1-2.2-2.71C110.6,117.07,115.33,104.52,135.85,104.55Zm-6-67.21C129.36,46.25,123,52.27,115.92,58c-2.58,2.1-3.79,1.36-5.6-.94-12-15.26-9.41-31.08,6.82-41.5,1.67-1.07,2.73-1.72,4.23.34C125.86,22,129.64,28.42,129.85,37.34ZM73.12,63.13c.22-2.77.46-5.54.65-8.31.16-2.26,1.23-3,3.52-2.69,21.47,3.25,28.51,13.47,25.56,34-.26,1.8-.55,3.36-3.26,3C83,87.05,72.79,79.77,73.12,63.13Zm52.32,29.68c-2.93-.41-5.86-.84-8.79-1.21-1.58-.21-2.23-.72-2.19-2.63.39-19,17.67-31.82,35.26-26.09,1.57.51,2.29,1.1,2,2.89C149.41,82.62,142.71,92.67,125.44,92.81ZM71.36,160.5c-8.42.29-19.09-7.18-21.22-13.74-.42-1.28,0-1.69.78-2.39,5.46-5.37,17.56-7.63,23.82-4.1,5.41,3.06,12.37,8,11.14,13.14C84.69,158.39,76.3,159.86,71.36,160.5Z"></path></svg>
                </div>
                <h2 id="welcome-title"><span class="blue">Collaborative</span> blogging website for enthusiast readers and writers</h2>
                <p id="welcome-text">Where the internet is about the freedome and availability of information, our aim is to provide useful and valuable content to our visitors.</p>
                <a href="{{ route('discover') }}" id="discover-button">
                    <svg class="compass mr8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M129.93,253.53c-68-.07-123.6-55.81-123.42-123.74C6.69,61.7,62.5,6.13,130.34,6.48S253.4,62.05,253.49,129.91,197.89,253.6,129.93,253.53Zm.26-24.9A98.63,98.63,0,1,0,31.4,130.47,98.39,98.39,0,0,0,130.19,228.63ZM114.3,110.34a5.81,5.81,0,0,0-3.74,3.27C102.8,133.15,95,152.69,86.88,173.13l59.63-23.74a5.33,5.33,0,0,0,3-3.26c7.72-19.42,15.46-38.83,23.61-59.25C152.81,95,133.57,102.69,114.3,110.34Z"></path></svg>
                    <span class="bold">DISCOVER</span>
                </a>
            </div>
            <svg id="move-down-button" fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M213,130.29c-.74,14.85,1.12,29.77-1.19,44.56A83.61,83.61,0,0,1,45.62,163.63q-.61-33.09,0-66.21c.73-42.86,34.7-79.25,76-81.86,45.51-2.89,83.35,26.67,90.23,70.65C214.11,100.83,212.27,115.6,213,130.29ZM192,133c0-13.07,0-23.53,0-34a58.62,58.62,0,0,0-1.55-13.6C183.13,54,154,32.83,123,36.39,90.16,40.18,66.48,66.51,66.38,99.5c-.06,20.6,0,41.21,0,61.82a71.46,71.46,0,0,0,.88,10.73c4.46,29.83,31.44,52.67,62.21,52.58,30.5-.09,57.34-23,61.64-52.63C193.09,158.16,191.37,144.23,192,133ZM139.73,79.82c-.09-7.5-4.16-12.19-10.46-12.24s-10.58,4.65-10.63,12.07q-.14,19.36,0,38.73c0,7.38,4.39,12.1,10.7,12,6.13-.1,10.26-4.69,10.39-11.83.11-6.37,0-12.74,0-19.12C139.75,92.89,139.81,86.36,139.73,79.82Z"/></svg>
        </div>
    </section>
    <section id="features-section">
        <h2 class="section-title">welcome to the <span class="blue">best</span> blog in the planet</h2>
        <p class="section-brief-title">where one word is worth thousand images</p>
        <div class="features-box">
            <div class="feature-box">
                <svg class="feature-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M14.74,123.92c14.61-14.63,28.88-29,43.27-43.21a6.74,6.74,0,0,1,4.38-1.54q67.49-.12,135,0a6.84,6.84,0,0,1,4.39,1.52c14.39,14.23,28.66,28.58,43.3,43.23L129.9,244.85ZM129.37,202l1.08-.13,22.82-68.54H106.48C114.18,156.45,121.78,179.22,129.37,202Zm-22.65-7.44.89-.49c-.49-1.63-.94-3.28-1.48-4.89Q98.26,165.58,90.38,142c-3-8.89-2.95-8.89-12.34-8.89H48.33C68.35,154.16,87.53,174.36,106.72,194.56Zm104.73-61.44c-13.29,0-25.36-.08-37.43.14-1,0-2.3,2-2.75,3.31q-9.28,27.38-18.33,54.85a40.2,40.2,0,0,0-.76,4.07ZM107.52,98.31l-.65-1.21c-6.67,0-13.34,0-20,0s-14-1.68-19.56.69c-5.77,2.45-9.86,8.9-14.66,13.63-1,.94-1.77,2-3.21,3.66,13.54,0,26,0,38.4,0a5.21,5.21,0,0,0,3.25-1C96.63,108.85,102.06,103.56,107.52,98.31Zm44.13-1.2c6.17,6.14,11.27,11.41,16.62,16.4a7.77,7.77,0,0,0,4.82,1.52c11.09.13,22.19.08,33.29,0,1.08,0,2.16-.22,4-.43-5.88-5.88-11.14-11.19-16.5-16.41a4.38,4.38,0,0,0-2.78-1.08C178.42,97.09,165.71,97.11,151.65,97.11Zm-34.42,17.67h25.46l-12.34-12.87C126,106.19,121.59,110.5,117.23,114.78Zm54.39-57.36,15.56,9,18-31.13-15.55-9Zm-50.43-7.31h17.46V14.68H121.19ZM72.61,66.42l15.56-9c-6.09-10.53-12-20.73-18-31.13l-15.56,9C60.75,45.9,66.63,56.06,72.61,66.42Z"/></svg>
                <h3 class="dark feature-title">Valuable Content</h3>
                <p class="feature-description">One of our sublime goals is to provide a useful and valuable content to our readers to increase the efficiency of our website.</p>
            </div>
            <div class="feature-box">
                <svg class="feature-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M154.55,236.55H137.66v-9.46c0-13.31.07-26.61-.06-39.91a5.26,5.26,0,0,1,3-5.33c5.21-2.91,10.39-5.92,15.32-9.27a7,7,0,0,0,2.76-4.86c.21-13.75.33-27.5,0-41.25-.32-15.53-11.57-28-26-29.5-15.28-1.55-28.66,7.67-32.29,22.39a32.34,32.34,0,0,0-.83,7.54c-.09,13.6-.14,27.2.07,40.8a6.92,6.92,0,0,0,2.76,4.81c5.09,3.38,10.55,6.21,15.69,9.52,1.27.81,2.68,2.62,2.69,4,.17,16.29.1,32.58.07,48.87a8.59,8.59,0,0,1-.38,1.57H104.18V222.55c0-8.82,0-17.64,0-26.45,0-2.54-5.66-7.55-8.6-7.73C92.91,188.21,89,192.71,89,196q0,17.7,0,35.42v5.07H72.38c-.1-1.43-.26-2.72-.26-4,0-14.8.07-29.59-.08-44.39,0-2.86.58-5,3.2-6.2,6.57-3.11,8-8.31,7.65-15.28-.58-12.83-.31-25.7-.07-38.55A9.47,9.47,0,0,0,79.14,120c-7.7-6.36-16.32-8-25.54-4.21s-14.49,11-14.85,21.08c-.38,10.75-.2,21.52-.06,32.28,0,1.36,1.29,2.72,2,4.06.12.24.47.36.7.54,4.56,3.6,10.87,6.33,13.17,11s.67,11.4.69,17.23c0,9.86,0,19.72,0,29.59v5H38.59V224c0-9.12-.1-18.24.06-27.35.06-2.82-.7-4.73-3.07-6.39-4.63-3.26-10.84-6-13.06-10.52-2.31-4.73-.76-11.39-.74-17.21,0-10-.85-20.16.51-30,4.16-30.07,36.89-45,62.79-29.13.76.47,1.5,1,2.55,1.62,9.4-15.85,23-25.07,41.61-25,18.47.06,32,9.17,40.92,24.33,6.18-2.27,12-5.3,18.08-6.49a40.75,40.75,0,0,1,48.62,38.81c.46,13.59.17,27.2,0,40.8a6,6,0,0,1-2.06,4c-3.68,3.05-7.51,5.93-11.45,8.62A7,7,0,0,0,220,196.7c.19,13.14.08,26.28.08,39.74H203.46c-.07-1.41-.2-2.85-.2-4.3,0-14.64.06-29.29-.07-43.94,0-2.83.73-4.67,3.1-6.33,4.64-3.25,10.81-6,13-10.55,2.3-4.74.72-11.39.76-17.21s.11-11.36,0-17a24.22,24.22,0,0,0-42.13-15.33,10,10,0,0,0-2.26,6c-.19,14.8,0,29.59-.17,44.39,0,2.87.68,5,3.26,6.22,6.77,3.32,8.43,8.67,8,16-.67,12.36-.18,24.8-.18,37.2v5H169.73v-4.72c0-12,0-23.92,0-35.87,0-5.87-5-8.4-10.22-5.9-4.19,2-5.15,4.77-5.05,9.11C154.74,211.53,154.55,223.9,154.55,236.55ZM129.16,71.87a25.16,25.16,0,1,0-25-25.11A25.19,25.19,0,0,0,129.16,71.87Zm8.45-25.14a8.29,8.29,0,1,1-8.15-8.28A8.13,8.13,0,0,1,137.61,46.73ZM169.75,63.9a25.16,25.16,0,1,0,50.31-.74,25.16,25.16,0,0,0-50.31.74ZM195,55.16a8.35,8.35,0,1,1-8.33,8.19A8.25,8.25,0,0,1,195,55.16ZM63.74,88.78A25.48,25.48,0,0,0,89,63.32a25.21,25.21,0,0,0-25.68-24.9A24.89,24.89,0,0,0,38.64,63.74,25.2,25.2,0,0,0,63.74,88.78Zm-.23-16.93a8.39,8.39,0,0,1-8.14-8.34A8.47,8.47,0,0,1,64,55.16a8.35,8.35,0,0,1-.48,16.69Z"/></svg>
                <h3 class="dark feature-title">Collaborative</h3>
                <p class="feature-description">If you are a good blogger or passionate about writing, we provide the ability to share articles and posts to our visitors unlike the other blog websites.</p>
            </div>
            <div class="feature-box">
                <svg class="feature-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M15.35,185.87c1-17.64,8.56-31.13,23.81-39.92a5.67,5.67,0,0,0,3.29-5.08c2.44-28,15-50.16,38.22-66.13,2.37-1.63,2.64-3.41,2.65-5.92.13-24.13,17.56-43.25,42-46.19,22-2.66,43.73,13.11,49,35.77.68,2.87,1.46,5.94,1.1,8.78-.58,4.63,1.79,6.71,5.12,9.16,21.67,15.93,33.51,37.51,35.86,64.25a6.06,6.06,0,0,0,3.48,5.44c22.41,13,30.13,40.82,17.51,62.76-13,22.52-40.92,30-63.61,16.88a6.06,6.06,0,0,0-6.46-.27q-37.7,17.67-75.54.12a6.53,6.53,0,0,0-6.86.22c-15.45,8.73-31.24,8.9-46.55,0S16,203.07,15.35,185.87Zm142.26,24c-8.29-15.51-9.05-31.22-.23-46.64,8.91-15.59,23.13-22.72,41.1-23.47-2.55-20.6-11.91-36.71-28.38-49.09-9.58,15.51-22.92,24-40.64,24C111.58,114.66,98.22,106,88.9,91c-15.47,9.66-29.43,34.29-27.79,48.76,37.91,1.18,57.58,39.62,40.17,70.12C113.88,218.37,144.9,218.38,157.61,209.83Zm.18-141.42a28.35,28.35,0,1,0-28.17,28.53A28.57,28.57,0,0,0,157.79,68.41ZM62,157.78a28.32,28.32,0,0,0-.84,56.64c15.4.39,28.34-12.19,28.72-27.91C90.25,171.1,77.55,158,62,157.78ZM225.59,186.2a28.31,28.31,0,1,0-28.41,28.23A28.43,28.43,0,0,0,225.59,186.2Z"/></svg>
                <h3 class="dark feature-title my8">Interactivity</h3>
                <p class="feature-description">Our website provide a simple interface between content writers and readers to improve the interactivity and trust.</p>
            </div>
        </div>
    </section>
    <!-- featured posts -->
    <div class="full-center flex-column mb8">
        <h2 class="section-title">Featured posts</h2>
        <p class="section-brief-title">Most popular and special posts admired by community</p>
    </div>
    <section id="featured-posts-section">
        
    </section>
    @include('partials.viewers.newsletter-viewer')
    <div id="newsletter-section">
        <svg class="icon" fill="#2c3237" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 260 260"><path d="M5.22,96.23c5.69-2.47,11.29-5.14,17.07-7.38Q71.87,69.68,121.52,50.7q50.1-19.19,100.23-38.27c4.78-1.83,9.4-4.3,14.33-5.52,3-.74,7-.56,9.38,1,1.25.82.68,5.79-.32,8.41-4.93,12.88-10.62,25.48-15.41,38.4Q217.94,86.51,207,118.58c-5.84,17-11.16,34.15-16.79,51.21-1.76,5.32-3.65,5.87-8.54,3.18a55.87,55.87,0,0,0-8.68-4.1c-12.71-4.4-25.47-8.6-38.32-12.91-5.13,10.65-12.71,20.65-21,30.24S97.76,205.53,90,215.38c-1.85,2.36-3.89,4.6-6.66,3.29-2.09-1-4.58-3.56-4.82-5.67-1.93-16.74-3.71-33.5-4.86-50.31-.88-12.95-.67-26-1.31-39-.08-1.6-2.16-3.76-3.84-4.52a208.7,208.7,0,0,0-52-15.44c-3.93-.67-7.57-3-11.35-4.65Zm235-80.08-1.51-.87c-15.1,11.64-31,22.38-45.13,35.12-29.34,26.51-57.8,54-86.34,81.35a24.62,24.62,0,0,0-6.3,12.06c-2.49,11.6-3.84,23.43-6,35.1-1.58,8.33-3.82,16.53-5.77,24.79l.82.45,40.7-51.7L108,142l-5.89,25.54-1.6-.35c.91-8.51,1.44-17.09,2.85-25.52,1.06-6.29,3.13-7.38,9.16-5,8.94,3.52,17.52,7.95,26.43,11.54,14.82,6,29.79,11.56,45,17.45C201.16,115.07,216.4,64,240.2,16.15ZM76.66,114.77C90.8,104.39,104,93,119.85,85,130,79.94,139.3,73.17,148.79,66.86,169.53,53,190.16,39,210.83,25.1L210,23.57,19.63,97.39A147.54,147.54,0,0,1,76.66,114.77Zm7.41,83.75,1.67.07c2.43-14.38,5.58-28.7,7.1-43.18,1.55-14.75,6.66-26.62,18-36.83,21.17-19,41.25-39.21,61.77-58.93.15-.13.1-.48.21-1.2-1.08.54-1.92.88-2.68,1.35-7.81,4.77-15.58,9.61-23.42,14.33-13.34,8-27,15.59-40,24.05-9.56,6.19-18.4,13.49-27.51,20.36a4.31,4.31,0,0,0-1.72,2.64c-.44,6.38-1.22,12.81-.85,19.16.56,9.77,1.8,19.52,3.06,29.24S82.6,188.87,84.07,198.52Zm16.69,54c2.79-.54,5.63-.91,8.35-1.7a3.89,3.89,0,0,0,2.45-2.48c.09-.78-1.24-2.28-2.2-2.54-7-1.94-13.51.19-20.11,1.67L89,249l8.86,3.56ZM203.7,209.4c5.75,1.9,11.51,3.77,17.29,5.56a11.37,11.37,0,0,0,4.2.7c2.87-.24,3.52-1.84,2-4.3-4.36-7.23-18.9-9.48-26.29-3.53A18.13,18.13,0,0,0,203.7,209.4Zm-28.49-4c-6,1.87-11,5.2-13.76,10.91l.82,1.47,24.32-8.94C182.77,203.5,178.92,204.23,175.21,205.38Zm-46.33,33c-.36.36.6,3.12,1.26,3.25,5.35,1.07,17.39-7.65,18.79-13.89C140.11,228,134.31,232.94,128.88,238.42ZM52.71,233c3.2,10.83,13.53,17.87,21.15,13.68C66.45,242.07,62,234.47,52.71,233Zm-7.87-6.58c-.9-8.53-4-15.72-7.59-23.3C32,210,36.36,223.21,44.84,226.45Zm206.89,1.28c-3.62-3-7.29-5.91-10.95-8.85-.73,1.12-2.32,2.92-2.06,3.27,2.6,3.32,5.21,6.77,8.44,9.43,2.32,1.91,5.12.17,5-2.64C252,228.61,252,228,251.73,227.73ZM37.58,166.48a29.66,29.66,0,0,0-5.33,17.07c0,1.1,1.35,2.18,2.08,3.27,1-1.07,2.49-2,2.8-3.23a96.8,96.8,0,0,0,2-11.24,42.87,42.87,0,0,0,0-5.67Zm3.73-12.67a3,3,0,0,0,1.71,2,2.74,2.74,0,0,0,2.4-1c2.64-4.45,5.1-9,8.08-14.33C48.08,140.9,40.42,150.27,41.31,153.81ZM115.18,156c-.31,1.34-1.13,2.81-.82,4,.45,1.72,1.72,3.22,2.64,4.81.6-.88,1.79-1.84,1.68-2.63a42.14,42.14,0,0,0-1.74-6.3Zm-3,13.17v-10C108.39,163.5,108.5,166.4,112.14,169.21ZM100,120.26c1.06-1.26,1.28-3.32,1.6-5.07.07-.43-.93-1-1.44-1.58-.77,1.18-1.53,2.35-2.32,3.51a3.23,3.23,0,0,1-.54.5l1.08-1.13-3.54-3.57L92.9,114.4l1.3,9.09C96.84,122.09,98.89,121.57,100,120.26Zm-12.48,7A2.16,2.16,0,0,0,89,128.79a2.07,2.07,0,0,0,1.68-1.17c.37-3.18.7-6.45-3.22-9.29C87.46,121.85,87.38,124.58,87.53,127.3Z"/></svg>
        <span class="title">{{ __('SUBSCRIBE TO OUR NEWSLETTER') }}</span>
        <p class="description">{{ __('Receive insightful articles and topics chosen by our expert artisans') }}</p>
        <div id="newsletter-subscribe-opener-button">
            <span>{{ __('SUBSCRIBE') }}</span>
        </div>
    </div>
    @include('partials.footer')
@endsection