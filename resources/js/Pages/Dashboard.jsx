import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Dashboard() {
    return (
        <AuthenticatedLayout
            // header={
            //     <h2 className="text-xl font-semibold leading-tight text-gray-800">
            //         Dashboard
            //     </h2>
            // }
        >
            <Head title="Dashboard" />

            <div className="">
                <div className="">
                    <div className="w-full h-screen bg-white">
                        <div className="px-11 py-6 text-gray-900">
                            You're logged in!
                        </div>
                        <div className="px-11 py-6 text-gray-900">
                            You're logged in!
                        </div>
                        <div className="px-11 py-6 text-gray-900">
                            You're logged in!
                        </div>
                        <div className="px-11 py-6 text-gray-900">
                            You're logged in!
                        </div>
                        <div className="px-11 py-6 text-gray-900">
                            You're logged in!
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
