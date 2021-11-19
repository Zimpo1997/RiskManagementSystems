<div class="left-side-bar">
    <div class="brand-logo bg-dark">
        <a href="/">
            {{-- <img src="{{ URL::to('/') }}/vendors/images/deskapp-logo.svg" alt="" class="dark-logo" />
            <img src="{{ URL::to('/') }}/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo" /> --}}
            <img src="{{ URL::to('/') }}/vendors/pictures/logo_pht.png" width="35" height="35" alt="logo"
                class="light-logo pr-1" />
            <span>{{ __('panel.site_head') }}</span>
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                {{-- @role('admin') --}}
                <li>
                    <a href="{{ URL::to('/dashboard') }}"
                        class="dropdown-toggle no-arrow {{ request()->is('/*') ? 'active' : '' }}">
                        <span class="micon dw dw-house"></span><span class="mtext">Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('/risks/create') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-clipboard1"></span><span
                            class="mtext">รายงานอุบัติการณ์</span>
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('/risks') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-price-tag"></span><span class="mtext">อุบัติการณ์ของคุณ</span>
                        {{-- <span class="badge rounded-pill bg-info">@include('layouts.partials.notification')</span> --}}
                    </a>
                </li>
                @role('rm_admin' || 'rm_program' || 'rm_boss' || 'agency')
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon fa fa-tasks"></span><span class="mtext">จัดการ</span>
                        </a>
                        <ul class="submenu">
                            @role('rm_admin')
                                <li class="navigation-header mt-2 mb-0">
                                    <span class="text-info ml-4 ">RM Admin</span>
                                </li>
                                <li><a href="{{ URL::to('/risks/rmadmin/manage') }}"><span
                                            class="mtext">ตรวจสอบความเสี่ยง</span>
                                        {{-- <span class="badge rounded-pill" data-bgcolor="#FFCA28">3</span> --}}
                                    </a>

                                </li>
                                <li><a href="{{ URL::to('/risks/rmadmin/show') }}"><span
                                            class="mtext">รายการความเสี่ยง</span>
                                        {{-- <span class="badge rounded-pill" data-bgcolor="#00C853">3</span> --}}
                                    </a></li>
                                <li><a href="{{ URL::to('/risks/rmadmin/showbackprogram') }}"><span
                                            class="mtext">ตรวจสอบความเสี่ยงอีกครั้ง</span>
                                        {{-- <span class="badge rounded-pill" data-bgcolor="#F57C00">3</span> --}}
                                    </a></li>
                            @endrole
                            @role('rm_program')
                                <li class="navigation-header mt-2 mb-0">
                                    <span class="text-info ml-4 ">RM Program</span>
                                </li>
                                <li><a href="{{ URL::to('/risks/rmprogram/manage') }}"><span
                                            class="mtext">ตรวจสอบความเสี่ยง</span></a></li>
                                <li><a href="{{ URL::to('/risks/rmprogram/show') }}"><span
                                            class="mtext">รายการความเสี่ยง</span></a></li>
                                <li><a href="{{ URL::to('/risks/rmprogram/showbackprogram') }}"><span
                                            class="mtext">ตรวจสอบความเสี่ยงอีกครั้ง</span></a></li>
                            @endrole
                            @role('rm_boss')
                                <li class="navigation-header mt-2 mb-0">
                                    <span class="text-info ml-4 ">Boss</span>
                                </li>
                                <li><a href="{{ URL::to('/risks/boss/manage') }}"><span
                                            class="mtext">ตรวจสอบความเสี่ยง</span></a></li>
                                <li><a href="{{ URL::to('/risks/boss/show') }}"><span
                                            class="mtext">รายการความเสี่ยง</span></a></li>
                            @endrole
                            @role('agency')
                                <li class="navigation-header mt-2 mb-0">
                                    <span class="text-info ml-4 ">Department</span>
                                </li>
                                <li><a href="{{ URL::to('/risks/agency') }}"><span
                                            class="mtext">อุบัติการณ์ภายในหน่วยงาน</span></a></li>
                                <li><a href="{{ URL::to('/risks/agency/manage') }}"><span
                                            class="mtext">แก้ไขความเสี่ยง</span></a></li>
                                <li><a href="{{ URL::to('/risks/agency/show') }}"><span
                                            class="mtext">รายการความเสี่ยง</span></a></li>
                                <li><a href="{{ URL::to('/risks/agency/listevent') }}"><span
                                            class="mtext">รายงานหน่วยงาน/ร่วมแก้ไข</span></a>
                                <li><a href="{{ URL::to('/risks/agency/show') }}"><span class="mtext">จัดทำ ปค.
                                            4</span></a>
                                </li>
                            @endrole
                        </ul>
                    </li>
                @endrole
                @role('admin')
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-settings"></span><span class="mtext">ตั้งค่าระบบ</span>
                        </a>
                        <ul class="submenu">

                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="micon dw dw-name"></span><span class="mtext">ตั้งค่าทั่วไป</span>
                                </a>
                                <ul class="submenu">
                                    <li><a href="{{ URL::to('/member') }}">จัดการข้อมูลบุคลากร</a>
                                    </li>
                                    <li><a href="{{ URL::to('/users') }}">จัดการผู้เข้าใช้งาน</a>
                                    </li>
                                    <li><a href="{{ URL::to('/roles') }}">บทบาท</a></li>
                                    <li><a href="{{ URL::to('/permissions') }}">การอนุญาต</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="micon dw dw-building1"></span><span
                                        class="mtext">ตั้งค่าองค์กร</span>
                                </a>
                                <ul class="submenu">
                                    <li><a href="{{ URL::to('/missions') }}">จัดการพันธกิจ</a></li>
                                    <li><a href="{{ URL::to('/workgroups') }}">จัดการกลุ่มงาน</a></li>
                                    <li><a href="{{ URL::to('/') }}">จัดการหน่วยงาน</a></li>
                                    <li><a href="{{ URL::to('/') }}">จัดการโปรแกรม</a></li>
                                    <li><a href="{{ URL::to('/') }}">จัดการทีมงาน</a></li>
                                    <li><a href="{{ URL::to('/') }}">จัดการสถานที่เกิดเหตุ</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="micon dw dw-first-aid-kit"></span><span
                                        class="mtext">ตั้งค่าความเสี่ยง</span>
                                </a>
                                <ul class="submenu">
                                    <li><a href="{{ URL::to('/') }}">จัดการกลุ่มความเสี่ยง</a></li>
                                    <li><a href="{{ URL::to('/') }}">จัดการหมวดหมู่ความเสี่ยง</a></li>
                                    <li><a href="{{ URL::to('/') }}">จัดการประเภทความเสี่ยง</a></li>
                                    <li><a href="{{ URL::to('/') }}">จัดการประเภทย่อยความเสี่ยง</a></li>
                                    <li><a href="{{ URL::to('/') }}">จัดการความเสี่ยง</a></li>
                                    <li><a href="{{ URL::to('/') }}">จัดการระดับความรุนแรง</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endrole
                {{-- <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-name"></span><span class="mtext">คู่มือการใช้งาน</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ URL::to('/') }}">คู่มือ</a></li>
                    </ul>
                </li> --}}
                {{-- @endrole --}}
                {{-- @role('user')
                <li>
                    <a href="{{ URL::to('/dashboard') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house"></span><span class="mtext">Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('/dashboard') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar1"></span><span class="mtext">วันนัดหมาย</span>
                    </a>
                </li>
                @endrole --}}
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
