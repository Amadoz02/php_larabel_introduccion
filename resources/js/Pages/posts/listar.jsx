
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import React from "react";

const Posts = ({ posts }) => (
    <AuthenticatedLayout>

    
    <div>
        <header className="bg-gray-800 text-white p-4 text-center">
            <h1 className="text-2xl font-bold">Mi Blog</h1>
        </header>
        <header className="bg-gray-800 text-white p-4 text-center">
            <a
                href="/posts/create"
                className="text-blue-600 hover:underline mb-4 inline-block"
            >
                Crear nuevo posts
            </a>
        </header>
        <h1 className="text-3xl font-bold mb-8 text-center">LOS POST DE MI PAGE</h1>
        {posts.map((item) => (
            <div
                key={item.id}
                className="bg-white rounded-lg shadow-md overflow-hidden flex flex-col mx-auto mb-6"
                style={{ maxWidth: "400px" }}
            >
                <img
                    src={item.images?.url || "hola"}
                    alt="Post image"
                    className="w-400 h-80 object-cover"
                />
                <div className="p-6 flex-1 flex flex-col">
                    <h2 className="text-xl font-semibold mb-2">{item.title}</h2>
                    <p className="text-gray-700 mb-4 flex-1">{item.body}</p>
                </div>
            </div>
        ))}
    </div>
    </AuthenticatedLayout>
);

export default Posts;
