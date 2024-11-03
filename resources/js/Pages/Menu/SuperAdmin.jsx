import { Link } from "@inertiajs/react";

export default function SuperAdmin() {
    return (
        <div className="h-full w-full bg-white">
            <Link href={route('dashboard.superadmin')}>
                <div className="flex cursor-pointer justify-center border-b border-gray-100 p-4">
                    Daftar Pengguna
                </div>
            </Link>
        </div>
    );
}