import { getMenuById } from '@/app/services/menuService'
import Link from 'next/link'

export default async function Header() {

    const menuData = await getMenuById(9)

    if (!menuData) return

    console.log(menuData)

    return (
        <header className="bg-white shadow-md">
            <div className="container mx-auto px-4 py-4 flex justify-between items-center">
                <Link href="/" className="text-xl font-bold text-gray-900">Next.js</Link>
                <nav>
                    <ul className="flex space-x-4">
                        <li className="relative group">
                            <Link href="/" className="text-gray-800 hover:underline">Home</Link>
                        </li>
                        <li className="relative group">
                            <button className="text-gray-800 hover:underline">About</button>
                            <ul className="absolute left-0 w-40 bg-white text-black rounded shadow-lg hidden group-hover:block">
                                <li><Link href="/about/team" className="block px-4 py-2 hover:bg-gray-100">Team</Link></li>
                                <li><Link href="/about/contact" className="block px-4 py-2 hover:bg-gray-100">Contact</Link></li>
                            </ul>
                        </li>
                        <li><Link href="/services" className="text-gray-800 hover:underline">Services</Link></li>
                    </ul>
                </nav>
            </div>
        </header>
    )
}