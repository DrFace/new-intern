import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { PageProps } from '@/types';
import { Link } from '@inertiajs/react';

export default function Categories({ auth }: PageProps) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<div className='flex justify-between'>
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">Categories</h2>
                <Link href={route("categories.create")} className='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>
                Create Category
                </Link>
            </div>
            }
        >
            <Head title="Categories" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">You're logged in!</div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
