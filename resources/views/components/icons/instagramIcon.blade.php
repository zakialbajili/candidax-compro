@props(['width'=>'20','height'=>'20','class'=>''])
<svg
    width="{{$width}}"
    height="{{$height}}"
    viewBox="0 0 20 20"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
    {{ $attributes->merge(['class' => $class]) }}
>
    <path 
        d="M10 7.52C9.5095 7.52 9.03002 7.66545 8.62219 7.93795C8.21435 8.21046 7.89648 8.59778 7.70878 9.05095C7.52107 9.50411 7.47196 10.0028 7.56765 10.4838C7.66334 10.9649 7.89954 11.4068 8.24638 11.7536C8.59321 12.1005 9.0351 12.3367 9.51618 12.4323C9.99725 12.528 10.4959 12.4789 10.9491 12.2912C11.4022 12.1035 11.7895 11.7856 12.062 11.3778C12.3346 10.97 12.48 10.4905 12.48 10C12.48 9.67432 12.4159 9.35183 12.2912 9.05095C12.1666 8.75006 11.9839 8.47666 11.7536 8.24638C11.5233 8.01609 11.2499 7.83341 10.9491 7.70878C10.6482 7.58415 10.3257 7.52 10 7.52ZM19.93 5.07C19.9254 4.2977 19.7832 3.5324 19.51 2.81C19.3093 2.28126 18.9987 1.80109 18.5988 1.40119C18.1989 1.00128 17.7187 0.690718 17.19 0.49C16.4676 0.216848 15.7023 0.0746239 14.93 0.0699999C13.64 -6.70552e-08 13.26 0 10 0C6.74 0 6.36 -6.70552e-08 5.07 0.0699999C4.2977 0.0746239 3.5324 0.216848 2.81 0.49C2.28126 0.690718 1.80109 1.00128 1.40119 1.40119C1.00128 1.80109 0.690718 2.28126 0.49 2.81C0.216848 3.5324 0.0746239 4.2977 0.0699999 5.07C-6.70552e-08 6.36 0 6.74 0 10C0 13.26 -6.70552e-08 13.64 0.0699999 14.93C0.0815297 15.7049 0.223517 16.4723 0.49 17.2C0.688704 17.7269 0.999152 18.2045 1.4 18.6C1.7984 19.0021 2.27953 19.3126 2.81 19.51C3.5324 19.7832 4.2977 19.9254 5.07 19.93C6.36 20 6.74 20 10 20C13.26 20 13.64 20 14.93 19.93C15.7023 19.9254 16.4676 19.7832 17.19 19.51C17.7205 19.3126 18.2016 19.0021 18.6 18.6C19.0008 18.2045 19.3113 17.7269 19.51 17.2C19.7823 16.4739 19.9244 15.7055 19.93 14.93C20 13.64 20 13.26 20 10C20 6.74 20 6.36 19.93 5.07ZM17.39 13.07C17.3584 13.6872 17.2267 14.2951 17 14.87C16.8059 15.3497 16.5173 15.7854 16.1514 16.1514C15.7854 16.5173 15.3497 16.8059 14.87 17C14.2897 17.2141 13.6783 17.3323 13.06 17.35H6.94C6.32167 17.3323 5.71035 17.2141 5.13 17C4.63395 16.816 4.18605 16.522 3.82 16.14C3.45742 15.7815 3.17756 15.348 3 14.87C2.78574 14.2901 2.6708 13.6782 2.66 13.06V6.94C2.6708 6.32185 2.78574 5.70994 3 5.13C3.18397 4.63395 3.47801 4.18605 3.86 3.82C4.22053 3.45986 4.6534 3.18037 5.13 3C5.71035 2.78589 6.32167 2.66768 6.94 2.65H13.06C13.6783 2.66768 14.2897 2.78589 14.87 3C15.3661 3.18397 15.8139 3.47801 16.18 3.86C16.5426 4.21854 16.8224 4.65199 17 5.13C17.2141 5.71035 17.3323 6.32167 17.35 6.94V10C17.35 12.06 17.42 12.27 17.39 13.06V13.07ZM15.79 5.63C15.6709 5.30698 15.4832 5.01364 15.2398 4.77021C14.9964 4.52678 14.703 4.33906 14.38 4.22C13.9365 4.06626 13.4693 3.99179 13 4H7C6.52827 4.00461 6.06107 4.09263 5.62 4.26C5.30193 4.37366 5.01169 4.55371 4.76858 4.7882C4.52547 5.02269 4.33506 5.30624 4.21 5.62C4.06531 6.06549 3.99437 6.53163 4 7V13C4.01046 13.4711 4.0983 13.9374 4.26 14.38C4.37906 14.703 4.56678 14.9964 4.81021 15.2398C5.05364 15.4832 5.34698 15.6709 5.67 15.79C6.0968 15.9464 6.54571 16.0342 7 16.05H13C13.4717 16.0454 13.9389 15.9574 14.38 15.79C14.703 15.6709 14.9964 15.4832 15.2398 15.2398C15.4832 14.9964 15.6709 14.703 15.79 14.38C15.9574 13.9389 16.0454 13.4717 16.05 13V7C16.0498 6.52784 15.9616 6.05985 15.79 5.62V5.63ZM10 13.82C9.49882 13.82 9.00257 13.7211 8.53966 13.529C8.07676 13.3369 7.6563 13.0554 7.30238 12.7005C6.94846 12.3457 6.66803 11.9245 6.47714 11.4611C6.28626 10.9977 6.18868 10.5012 6.19 10C6.19 9.24405 6.4143 8.5051 6.83449 7.87669C7.25468 7.24828 7.85187 6.75866 8.55047 6.46983C9.24907 6.181 10.0177 6.10594 10.7589 6.25415C11.5002 6.40236 12.1808 6.76717 12.7147 7.30241C13.2485 7.83764 13.6116 8.51924 13.7578 9.2609C13.9041 10.0026 13.827 10.771 13.5363 11.4688C13.2457 12.1666 12.7545 12.7625 12.125 13.1811C11.4955 13.5996 10.7559 13.822 10 13.82ZM14 6.93C13.7789 6.9066 13.5744 6.80222 13.4257 6.63697C13.277 6.47172 13.1947 6.25729 13.1947 6.035C13.1947 5.81271 13.277 5.59828 13.4257 5.43303C13.5744 5.26778 13.7789 5.1634 14 5.14C14.2211 5.1634 14.4256 5.26778 14.5743 5.43303C14.723 5.59828 14.8053 5.81271 14.8053 6.035C14.8053 6.25729 14.723 6.47172 14.5743 6.63697C14.4256 6.80222 14.2211 6.9066 14 6.93Z" 
        fill="currentColor"
    />
</svg>
